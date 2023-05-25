<!DOCTYPE html>
<html>
<head>
    <title>QR Code</title>
</head>
<body>
    <h1>QR Code for {{ $user_info->email }}</h1>
     
    <div>{!! $qrCode !!}</div>

    <form action="{{ route('user.qrcode.download', ['email' => $user_info->email]) }}" method="POST">
        @csrf
        <button type="submit">Download QR Code</button>
    </form>
</body>
</html>
