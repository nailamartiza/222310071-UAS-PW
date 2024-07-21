<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CleanTrack Login</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">

</head>
<body>
    <div class="login-container">
        <img src="{{ asset('images/logo.png') }}" alt="CleanTrack Logo">
        <h1>CleanTrack</h1>

        @if (session()->has("err"))
            <h5>{{session("err")}}</h5>
        @endif

        <form method="POST" action="/login">
            @csrf
            <input type="text" name="email" placeholder="Enter Email or Username" required>
            <input type="password" name="password" placeholder="Enter Password" required>
            <button type="submit">Sign In</button>
        </form>
    </div>
</body>
</html>
