<!DOCTYPE html>
<html class="light" lang="vi">

<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>LuvHub Notification</title>

    <style>
        body {
            margin: 0;
            padding: 0;
            background: #f8f5f6;
            font-family: Arial, Helvetica, sans-serif;
        }

        .container {
            max-width: 520px;
            margin: 20px auto;
            background: #ffffff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }

        .header {
            background: #f42559;
            padding: 32px 16px;
            text-align: center;
            color: white;
        }

        .logo-circle {
            width: 60px;
            height: 60px;
            margin: 0 auto 16px;
            border-radius: 999px;
            background: rgba(255,255,255,0.25);
            backdrop-filter: blur(4px);
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 32px;
        }

        .content {
            padding: 32px;
            color: #333333;
            font-size: 16px;
            line-height: 1.6;
        }

        .title {
            font-size: 22px;
            font-weight: bold;
            margin-bottom: 16px;
        }

        .button {
            display: inline-block;
            background: #f42559;
            color: #ffffff !important;
            padding: 14px 26px;
            border-radius: 40px;
            font-weight: bold;
            font-size: 16px;
            text-decoration: none;
            margin-top: 24px;
        }

        .button:hover {
            background: #d11e4a;
        }

        .footer-link {
            word-break: break-all;
            color: #f42559;
            text-decoration: none;
            font-size: 13px;
        }

        .bottom {
            background: #f3f3f3;
            padding: 20px;
            text-align: center;
            font-size: 12px;
            color: #8e8e8e;
        }

        a { color: #f42559; }
    </style>

</head>

<body>

    <div class="container">

        <!-- Header -->
        <div class="header">
            <div class="logo-circle">❤</div>
            <h1 style="margin:0;font-size:28px;">LuvHub</h1>
        </div>

        <!-- Body -->
        <div class="content">
            <div class="title">Hello there!</div>

            <p>
                We received a request to access your account on LuvHub.
                Click the button below to navigate directly to your dashboard.
            </p>

            <center>
                <a href="{{ url('login/reset/' . $user->user_id . '/' . $user->verify_token) }}"
                   class="button">
                    Reset your password here
                </a>
            </center>

            <p style="font-size:14px;color:#777;margin-top:20px;">
                If you did not request this email, just ignore it.  
                This link will expire in 24 hours.
            </p>

            <hr style="border:0;border-top:1px solid #eee;margin:24px 0;">

            <p style="font-size:12px;color:#999;">
                Button not working? Copy and paste this link:
            </p>

            <a href="{{ url('login/reset/' . $user->user_id . '/' . $user->verify_token) }}" 
               class="footer-link">
               {{ url('login/reset/' . $user->user_id . '/' . $user->verify_token) }}
            </a>
        </div>

        <!-- Footer -->
        <div class="bottom">
            <p>&copy; 2024 LuvHub Inc. All rights reserved.</p>
            <p>
                <a href="#" style="color:#f42559;">Privacy Policy</a> • 
                <a href="#" style="color:#f42559;">Contact Support</a>
            </p>
        </div>

    </div>

</body>
</html>
