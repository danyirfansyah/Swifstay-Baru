<!-- resources/views/reset_password.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Password</title>
    <link rel="stylesheet" href="{{ asset('signInStyle.css') }}">
</head>
<body>
    <div class="login">
        <form class="form-container" action="{{ route('reset.password') }}" method="POST">
            @csrf
            <h2 style="color:#4cb53f; font-size: 36px; font-weight: 500; width: 420px;">Welcome to</h2>
            <h2 style="color:#4cb53f; font-size: 36px; font-weight: 800; width: 420px;">SwiftStay</h2>
            <br><br><br>

            @if (session('error'))
                <div class="error-message">{{ session('error') }}</div>
            @endif

            <label class="form-label" for="username"></label>
            <input class="form-input" type="text" placeholder="Username" id="username" name="username" required>

            <label class="form-label" for="email"></label>
            <input class="form-input" type="email" placeholder="Email" id="email" name="email" required>

            <label class="form-label" for="password"></label>
            <input class="form-input" type="password" placeholder="Password Baru" id="password" name="password" required>
            <br/>
            <button id="ubahPasswordBtn" class="btn-submit" name="submit" type="submit">Ubah Password</button>
            <br/>
        </form>
    </div>
</body>
</html>
