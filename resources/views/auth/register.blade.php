<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Daftar - Portal Berita</title>
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
        .btn-custom {
            border-radius: 50px;
            font-weight: bold;
        }
    </style>
</head>

<body>

<div class="card shadow">
    <h3 class="text-center mb-4">Daftar Akun Baru</h3>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="name" required class="form-control">
        </div>

        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" required class="form-control">
        </div>

        <div class="mb-3">
            <label>Password</label>
            <input type="password" name="password" required class="form-control">
        </div>

        <div class="mb-3">
            <label>Konfirmasi Password</label>
            <input type="password" name="password_confirmation" required class="form-control">
        </div>

        <button type="submit" class="btn btn-primary w-100 btn-custom">Daftar</button>
    </form>

    <div class="text-center mt-3">
        <a href="{{ route('login') }}">Sudah punya akun? Masuk</a>
    </div>
</div>

</body>
</html>
