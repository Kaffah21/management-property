<!DOCTYPE html>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

    <title>New Contact Request</title>
</head>
<body>
    <p><strong>Name:</strong> {{ $name }}</p>
    <p><strong>Email:</strong> {{ $email }}</p>
    <p><strong>Message:</strong> {!! nl2br(e($message)) !!}</p> <!-- Menggunakan nl2br untuk memformat pesan -->
</body>
</html>
