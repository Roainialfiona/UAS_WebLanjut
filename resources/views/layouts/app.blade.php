<!doctype html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal Berita PRO</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom Style -->
    <style>
        body {
            background: #f4f6f9;
            font-family: 'Segoe UI', sans-serif;
        }
        .sidebar {
            width: 240px;
            height: 100vh;
            position: fixed;
            top: 0; left: 0;
            background: linear-gradient(to bottom, #4e73df, #224abe);
            color: white;
            padding: 20px 15px;
        }
        .sidebar h3 {
            text-align: center;
            font-weight: 800;
            margin-bottom: 40px;
        }
        .sidebar a {
            color: white;
            text-decoration: none;
            display: block;
            margin-bottom: 15px;
            font-weight: 500;
            padding: 10px 15px;
            border-radius: 8px;
            transition: 0.3s;
        }
        .sidebar a:hover {
            background: rgba(255,255,255,0.1);
        }
        .navbar-custom {
            margin-left: 240px;
            height: 60px;
            background: #fff;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 30px;
        }
        .content {
            margin-left: 260px;
            padding: 30px;
        }
    </style>
</head>
<body>

    <!-- Sidebar -->
    <div class="sidebar">
        <h3>THE DAILY INSIGHT</h3>
        <a href="{{ route('dashboard') }}">Dashboard</a>
        <a href="{{ route('berita.index') }}">Manajemen Berita</a>
    </div>

    <!-- Navbar -->
    <div class="navbar-custom d-flex justify-content-between align-items-center">
        <div class="fw-bold fs-5 ms-4"></div>
        <div class="dropdown me-4">
            <a class="fw-bold dropdown-toggle text-dark text-decoration-none" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                {{ ucfirst(Auth::user()->role) }}
            </a>

            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuLink">
                <li><a class="dropdown-item" href="{{ route('profile.edit') }}">Edit Profile</a></li>
                <li><hr class="dropdown-divider"></li>
                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="dropdown-item">Logout</button>
                    </form>
                </li>
            </ul>
        </div>
    </div>


    <!-- Content -->
    <div class="content">
        @yield('content')
    </div>

    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
