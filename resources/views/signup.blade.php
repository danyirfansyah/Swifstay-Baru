<!-- resources/views/signup.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buat Akun</title>
    <link rel="stylesheet" href="{{ asset('css/signInStyle.css') }}">
</head>
<body>
    <div class="login">
        <form id="signup" class="form-container" method="POST" action="{{ route('signup') }}">
            @csrf
            <h2 style="color:#4cb53f; font-size: 36px; font-weight: 500; width: 420px;">Buat Akun</h2>
            <h2 style="color:#4cb53f; font-size: 36px; font-weight: 800; width: 420px;"> SwiftStay</h2>
            <br><br><br>
                        
            <input class="form-input" type="text" placeholder="Nama" id="Nama" name="name" required>
            @error('name')
                <div class="error-message">{{ $message }}</div>
            @enderror
            <input class="form-input" type="text" placeholder="Username" id="username" name="username" required>
            @error('username')
                <div class="error-message">{{ $message }}</div>
            @enderror
            
            <input class="form-input" type="email" placeholder="Email" id="email" name="email" required>
            @error('email')
                <div class="error-message">{{ $message }}</div>
            @enderror
            
            <input class="form-input" type="password" placeholder="Password" id="password" name="password" required>
            @error('password')
                <div class="error-message">{{ $message }}</div>
            @enderror
            
            <input class="form-input" type="password" placeholder="Re-Enter Password" id="confirmPassword" name="password_confirmation" required>

            <select class="form-input" name="role" required>
                <option value="Pencari">Pencari Kos</option>
                <option value="Pemilik">Pemilik Kos</option>
            </select>

            <br>

            <button name="submit" class="btn-submit" type="submit">Sign Up</button>
            <br/>
            <div class="signin">Sudah punya akun? <a href="{{ route('signin') }}" style="color: #4cb53f; text-decoration: none; font-weight: 600;">Login disini</a></div>
        </form>
    </div>

    <script>
        document.getElementById('signup').addEventListener('submit', function(event) {
            let password = document.getElementById('password').value;
            let confirmPassword = document.getElementById('confirmPassword').value;
            if (password !== confirmPassword) {
                alert("Password tidak cocok!!");
                event.preventDefault();
            }
        });
    </script>
</body>
</html>
