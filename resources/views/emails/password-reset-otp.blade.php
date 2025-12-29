<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Reset OTP</title>
</head>
<body style="font-family: Arial, sans-serif; line-height: 1.6; color: #333; max-width: 600px; margin: 0 auto; padding: 20px;">
    <div style="background: linear-gradient(to right, #dc2626, #991b1b); padding: 30px; text-align: center; border-radius: 10px 10px 0 0;">
        <h1 style="color: white; margin: 0;">ATC JAPAN</h1>
    </div>
    
    <div style="background: #f9fafb; padding: 30px; border-radius: 0 0 10px 10px;">
        <h2 style="color: #1f2937; margin-top: 0;">Password Reset Request</h2>
        <p style="color: #4b5563;">You have requested to reset your password. Please use the following OTP to proceed:</p>
        
        <div style="background: white; border: 2px solid #dc2626; border-radius: 8px; padding: 20px; text-align: center; margin: 30px 0;">
            <div style="font-size: 36px; font-weight: bold; color: #dc2626; letter-spacing: 8px;">{{ $otp }}</div>
        </div>
        
        <p style="color: #4b5563;">This OTP will expire in 15 minutes. Please do not share this code with anyone.</p>
        
        <p style="color: #4b5563; margin-top: 30px;">If you didn't request a password reset, please ignore this email and your password will remain unchanged.</p>
        
        <div style="margin-top: 30px; padding-top: 20px; border-top: 1px solid #e5e7eb;">
            <p style="color: #6b7280; font-size: 14px; margin: 0;">Best regards,<br>ATC Japan Team</p>
        </div>
    </div>
</body>
</html>

