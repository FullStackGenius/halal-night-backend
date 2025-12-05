<!DOCTYPE html>
<html>
<head>
    <title>404 - Page Not Found</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        body {
            background: #f8f9fa;
            text-align: center;
            padding: 80px;
            font-family: Arial, sans-serif;
        }
        h1 {
            font-size: 80px;
            color: #ff4d4f;
        }
        p {
            font-size: 18px;
            margin-bottom: 20px;
        }
        a {
            display: inline-block;
            margin-top: 10px;
            padding: 10px 20px;
            background: #3490dc;
            color: #fff;
            text-decoration: none;
            border-radius: 6px;
        }
    </style>
</head>
<body>

    <h1>404</h1>
    <p>Oops! The page you're looking for doesn't exist.</p>

    <a href="{{ url('/') }}">Go Back Home</a>

</body>
</html>
