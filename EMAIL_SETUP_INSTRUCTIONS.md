# Email Setup Instructions - Fix Email Not Receiving

## Problem:
Emails are not being received because mail driver is set to `log` (emails saved to log file instead of being sent).

## Solution:

### Step 1: Update .env File
Open your `.env` file and add/update these lines:

```env
MAIL_MAILER=smtp
MAIL_HOST=mail.atcjapancars.com
MAIL_PORT=587
MAIL_USERNAME=subscribe@atcjapancars.com
MAIL_PASSWORD=@atcjapancars.com
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=subscribe@atcjapancars.com
MAIL_FROM_NAME="ATC Japan"
```

**⚠️ Important Notes:**
- Replace `@atcjapancars.com` with the actual complete password if that's not the full password
- If `mail.atcjapancars.com` doesn't work, try `smtp.atcjapancars.com`
- If port 587 doesn't work, try port 465 with `MAIL_ENCRYPTION=ssl`

### Step 2: Clear Configuration Cache
After updating `.env`, run:

```bash
php artisan config:clear
php artisan cache:clear
```

### Step 3: Test Email Sending
Visit this URL to test:
```
http://localhost:8000/test-email
```

### Step 4: Check Error Logs
If emails still don't work, check:
```
storage/logs/laravel.log
```

## Temporary Solution: View Emails in Log File

If SMTP is not set up yet, emails are being saved to log file. To view OTP codes:
1. Open: `storage/logs/laravel.log`
2. Search for "OTP" or "Email Verification"
3. You'll see the OTP code in the email content

## Common SMTP Settings:

**Option 1 (Recommended - Port 587 with TLS):**
```env
MAIL_PORT=587
MAIL_ENCRYPTION=tls
```

**Option 2 (Port 465 with SSL):**
```env
MAIL_PORT=465
MAIL_ENCRYPTION=ssl
```

**Option 3 (Port 25 - Less Secure):**
```env
MAIL_PORT=25
MAIL_ENCRYPTION=null
```

## Verify SMTP Settings:
If you're using cPanel hosting, check:
- Email Account settings in cPanel
- SMTP settings section
- Or contact your hosting provider for exact SMTP details

