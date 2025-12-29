<?php

namespace App\Http\Controllers;

use App\Mail\OtpVerificationMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class TestEmailController extends Controller
{
    public function test()
    {
        try {
            $otp = '123456';
            Mail::to('test@example.com')->send(new OtpVerificationMail($otp, 'email_verification'));
            
            return response()->json([
                'status' => 'success',
                'message' => 'Email sent successfully! Check your mail configuration.',
                'config' => [
                    'mailer' => config('mail.default'),
                    'host' => config('mail.mailers.smtp.host'),
                    'port' => config('mail.mailers.smtp.port'),
                    'from' => config('mail.from.address'),
                ]
            ]);
        } catch (\Exception $e) {
            Log::error('Email sending failed: ' . $e->getMessage());
            
            return response()->json([
                'status' => 'error',
                'message' => 'Email sending failed: ' . $e->getMessage(),
                'config' => [
                    'mailer' => config('mail.default'),
                    'host' => config('mail.mailers.smtp.host'),
                    'port' => config('mail.mailers.smtp.port'),
                    'from' => config('mail.from.address'),
                ]
            ], 500);
        }
    }
}

