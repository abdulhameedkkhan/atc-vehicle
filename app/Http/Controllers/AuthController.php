<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\OtpVerification;
use App\Mail\OtpVerificationMail;
use App\Mail\PasswordResetMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    /**
     * Show the login form.
     */
    public function showLoginForm()
    {
        return view('auth.login');
    }

    /**
     * Show the registration form.
     */
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    /**
     * Handle a registration request.
     */
    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Create user
        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'email_verified' => false,
        ]);

        // Generate OTP
        $otp = str_pad(rand(0, 999999), 6, '0', STR_PAD_LEFT);
        $expiresAt = now()->addMinutes(15);

        // Save OTP
        OtpVerification::create([
            'email' => $user->email,
            'otp' => $otp,
            'type' => 'email_verification',
            'expires_at' => $expiresAt,
            'is_used' => false,
        ]);

        // Send OTP email
        try {
            Mail::to($user->email)->send(new OtpVerificationMail($otp, 'email_verification'));
        } catch (\Exception $e) {
            \Log::error('OTP Email sending failed: ' . $e->getMessage());
            return back()->withErrors(['email' => 'Failed to send OTP email. Please try again later.'])->withInput();
        }

        // Store email in session for OTP verification
        $request->session()->put('verification_email', $user->email);

        return redirect()->route('verify-otp.show')
            ->with('success', 'Registration successful! Please verify your email with the OTP sent to your inbox.');
    }

    /**
     * Show OTP verification form.
     */
    public function showVerifyOtpForm(Request $request)
    {
        if (!$request->session()->has('verification_email')) {
            return redirect()->route('register')->with('error', 'Please register first.');
        }

        return view('auth.verify-otp');
    }

    /**
     * Handle OTP verification.
     */
    public function verifyOtp(Request $request)
    {
        $email = $request->session()->get('verification_email');
        
        if (!$email) {
            return redirect()->route('register')->with('error', 'Session expired. Please register again.');
        }

        $request->validate([
            'otp' => 'required|string|size:6',
        ]);

        $otpVerification = OtpVerification::where('email', $email)
            ->where('otp', $request->otp)
            ->where('type', 'email_verification')
            ->where('is_used', false)
            ->latest()
            ->first();

        if (!$otpVerification) {
            return back()->withErrors(['otp' => 'Invalid or expired OTP.'])->withInput();
        }

        if ($otpVerification->isExpired()) {
            return back()->withErrors(['otp' => 'OTP has expired. Please request a new one.'])->withInput();
        }

        // Mark OTP as used
        $otpVerification->update(['is_used' => true]);

        // Verify user email
        $user = User::where('email', $email)->first();
        if ($user) {
            $user->update([
                'email_verified' => true,
                'otp_verified_at' => now(),
                'email_verified_at' => now(),
            ]);
        }

        // Clear session
        $request->session()->forget('verification_email');

        // Auto login
        Auth::login($user);

        return redirect()->route('dashboard')
            ->with('success', 'Email verified successfully! You are now logged in.');
    }

    /**
     * Resend OTP.
     */
    public function resendOtp(Request $request)
    {
        $email = $request->session()->get('verification_email');
        
        if (!$email) {
            return redirect()->route('register')->with('error', 'Session expired. Please register again.');
        }

        // Generate new OTP
        $otp = str_pad(rand(0, 999999), 6, '0', STR_PAD_LEFT);
        $expiresAt = now()->addMinutes(15);

        // Save OTP
        OtpVerification::create([
            'email' => $email,
            'otp' => $otp,
            'type' => 'email_verification',
            'expires_at' => $expiresAt,
            'is_used' => false,
        ]);

        // Send OTP email
        try {
            Mail::to($email)->send(new OtpVerificationMail($otp, 'email_verification'));
        } catch (\Exception $e) {
            \Log::error('OTP Email sending failed (resend): ' . $e->getMessage());
            return back()->with('error', 'Failed to send OTP email. Please try again later.');
        }

        return back()->with('success', 'New OTP has been sent to your email.');
    }

    /**
     * Handle a login request.
     */
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials do not match our records.'],
            ]);
        }

        if (!$user->email_verified) {
            // Generate new OTP for verification
            $otp = str_pad(rand(0, 999999), 6, '0', STR_PAD_LEFT);
            $expiresAt = now()->addMinutes(15);

            OtpVerification::create([
                'email' => $user->email,
                'otp' => $otp,
                'type' => 'email_verification',
                'expires_at' => $expiresAt,
                'is_used' => false,
            ]);

            try {
                Mail::to($user->email)->send(new OtpVerificationMail($otp, 'email_verification'));
            } catch (\Exception $e) {
                \Log::error('OTP Email sending failed (login): ' . $e->getMessage());
                return redirect()->route('verify-otp.show')
                    ->with('error', 'Failed to send OTP email. Please try again later.');
            }

            $request->session()->put('verification_email', $user->email);

            return redirect()->route('verify-otp.show')
                ->with('error', 'Please verify your email first. An OTP has been sent to your email.');
        }

        if (Auth::attempt($request->only('email', 'password'), $request->filled('remember'))) {
            $request->session()->regenerate();

            return redirect()->intended('/dashboard');
        }

        throw ValidationException::withMessages([
            'email' => ['The provided credentials do not match our records.'],
        ]);
    }

    /**
     * Show forgot password form.
     */
    public function showForgotPasswordForm()
    {
        return view('auth.forgot-password');
    }

    /**
     * Handle forgot password request.
     */
    public function forgotPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return back()->withErrors(['email' => 'Email not found.']);
        }

        // Generate OTP
        $otp = str_pad(rand(0, 999999), 6, '0', STR_PAD_LEFT);
        $expiresAt = now()->addMinutes(15);

        // Save OTP
        OtpVerification::create([
            'email' => $user->email,
            'otp' => $otp,
            'type' => 'password_reset',
            'expires_at' => $expiresAt,
            'is_used' => false,
        ]);

        // Send OTP email
        try {
            Mail::to($user->email)->send(new OtpVerificationMail($otp, 'password_reset'));
        } catch (\Exception $e) {
            \Log::error('Password Reset OTP Email sending failed: ' . $e->getMessage());
            return back()->withErrors(['email' => 'Failed to send password reset email. Please try again later.'])->withInput();
        }

        // Store email in session
        $request->session()->put('reset_password_email', $user->email);

        return redirect()->route('reset-password.show')
            ->with('success', 'Password reset OTP has been sent to your email.');
    }

    /**
     * Show reset password form.
     */
    public function showResetPasswordForm(Request $request)
    {
        if (!$request->session()->has('reset_password_email')) {
            return redirect()->route('forgot-password')->with('error', 'Please request password reset first.');
        }

        return view('auth.reset-password');
    }

    /**
     * Handle password reset.
     */
    public function resetPassword(Request $request)
    {
        $email = $request->session()->get('reset_password_email');
        
        if (!$email) {
            return redirect()->route('forgot-password')->with('error', 'Session expired. Please request password reset again.');
        }

        $request->validate([
            'otp' => 'required|string|size:6',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $otpVerification = OtpVerification::where('email', $email)
            ->where('otp', $request->otp)
            ->where('type', 'password_reset')
            ->where('is_used', false)
            ->latest()
            ->first();

        if (!$otpVerification) {
            return back()->withErrors(['otp' => 'Invalid or expired OTP.'])->withInput();
        }

        if ($otpVerification->isExpired()) {
            return back()->withErrors(['otp' => 'OTP has expired. Please request a new one.'])->withInput();
        }

        // Mark OTP as used
        $otpVerification->update(['is_used' => true]);

        // Update password
        $user = User::where('email', $email)->first();
        if ($user) {
            $user->update([
                'password' => Hash::make($request->password),
            ]);
        }

        // Clear session
        $request->session()->forget('reset_password_email');

        return redirect()->route('login')
            ->with('success', 'Password reset successfully! Please login with your new password.');
    }

    /**
     * Handle a logout request.
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
