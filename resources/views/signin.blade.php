<!-- resources/views/signin.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('/css/signInStyle.css') }}">
</head>
<body>
    <div class="login">
        <form class="form-container" method="POST" action="{{ route('signin.submit') }}">
            @csrf
            <h2 style="color:#4cb53f; font-size: 36px; font-weight: 500; width: 420px;">Welcome to</h2>
            <h2 style="color:#4cb53f; font-size: 36px; font-weight: 800; width: 420px;">SwiftStay</h2>
            <br><br><br>

            @if (session('error'))
                <div class="error-message">{{ session('error') }}</div>
            @endif

            <label class="form-label" for="username"></label> 
            <input class="form-input" type="text" placeholder="Username" id="username" name="username" required> 

            <label class="form-label" for="password"></label> 
            <input class="form-input" type="password" placeholder="Password" id="password" name="password" required>

            <div class="lupa-password1">
                <a href="{{ route('password.request') }}" style="color: #4cb53f; text-decoration: none;">Lupa password?</a>
            </div>
            <br/>
            <button name="submit" class="btn-submit" type="submit">Login</button> 
            <br/>
            <div class="signup">Belum punya akun? <a href="{{ route('signup') }}" style="color: #4cb53f; text-decoration: none; font-weight: 600;">Buat akun</a></div>
        </form>
    </div>
</body>
</html>
