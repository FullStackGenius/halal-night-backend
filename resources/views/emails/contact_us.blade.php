<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Contact Us Message</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #F1F3F5;
            color: #000;
            margin: 0;
            padding: 0;
        }
        .email-wrapper {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }
        .email-header {
            text-align: center;
            margin-bottom: 30px;
            background-color: #BD8928;
            padding: 20px;
            border-radius: 10px 10px 0 0;
        }
        .email-header h1 {
            font-size: 32px;
            font-weight: 700;
            color: #fff;
            margin: 0;
        }
        .highlight-text {
            color: #fff;
        }
        .email-body {
            font-size: 16px;
            line-height: 1.6;
            color: #000;
            margin-bottom: 30px;
        }
        .email-footer {
            text-align: center;
            font-size: 14px;
            color: #999;
            background-color: #333;
            padding: 15px;
            border-radius: 0 0 10px 10px;
        }
        .email-footer a {
            color: #fff;
            text-decoration: none;
        }
        .email-footer a:hover {
            text-decoration: underline;
        }
        .email-footer .social-links {
            margin-top: 10px;
        }
        .email-footer .social-links a {
            margin: 0 8px;
            font-size: 18px;
            color: #fff;
        }
    </style>
</head>
<body>
    <div class="email-wrapper">
        <!-- Header Section -->
        <div class="email-header">
            <h1>A Dignified Path To <span class="highlight-text">Nikāḥ Al-Mut‘ah</span></h1>
        </div>

        <!-- Body Section -->
        <div class="email-body">
            <p><strong>Name:</strong> {{ $name }}</p>
            <p><strong>Email:</strong> {{ $email }}</p>
            <p><strong>Reason:</strong> {{ $reason }}</p>
            <p><strong>Subject:</strong> {{ $subject }}</p>
            <p><strong>Message:</strong></p>
            <p>{{ $messageContent }}</p>
        </div>

        <!-- Footer Section -->
        <div class="email-footer">
            <p>Thank you for contacting us!</p>
            <p>The Halal Nights Team</p>
            <div class="social-links">
                <a href="https://facebook.com" target="_blank">Facebook</a> |
                <a href="https://twitter.com" target="_blank">Twitter</a> |
                <a href="https://instagram.com" target="_blank">Instagram</a>
            </div>
            <p>© 2025 Halal Nights. All Rights Reserved.</p>
        </div>
    </div>
</body>
</html>
