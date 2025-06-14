<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login Portal Berita</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(90deg, #4e73df 50%, #f8f9fc 50%);
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Segoe UI', sans-serif;
        }
        .card {
            padding: 40px;
            border-radius: 1rem;
            width: 450px;
        }
        .btn-social {
            width: 100%;
            margin-bottom: 10px;
            border-radius: 50px;
        }
    </style>
</head>
<body>

<div class="card shadow">
    <h3 class="text-center mb-4">Masuk Portal Berita</h3>

    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" required class="form-control">
        </div>

        <div class="mb-3">
            <label>Password</label>
            <input type="password" name="password" required class="form-control">
        </div>

        <button type="submit" class="btn btn-primary w-100">Masuk</button>
    </form>

    <hr>

    <a href="{{ route('socialite.redirect', 'google') }}" class="btn btn-danger btn-social">Login with Google</a>
    <a href="{{ route('socialite.redirect', 'github') }}" class="btn btn-dark btn-social">Login with GitHub</a>

    <div class="text-center mt-3">
        <a href="{{ route('register') }}">Belum punya akun? Daftar</a>
    </div>
</div>

</body>
</html>
