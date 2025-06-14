<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>The Daily Insight</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            margin: 0;
            padding: 0;
            background: linear-gradient(90deg, #4e73df 50%, #f8f9fc 50%);
            height: 100vh;
            font-family: 'Segoe UI', sans-serif;
            color: #fff;
            overflow: hidden;
        }

        .left {
            position: absolute;
            left: 0;
            width: 50%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            padding: 50px;
            text-align: center;
        }

        .left h1 {
            font-size: 60px;
            font-weight: 800;
            line-height: 1.1;
        }

        .right {
            position: absolute;
            right: 0;
            width: 50%;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            color: #4e73df;
        }

        .circle-stack {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 20px;
            margin-bottom: 50px;
        }

        .circle {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            background: #4e73df;
        }

        .circle:nth-child(2) {
            background: #00d1b2;
        }

        .btn-custom {
            padding: 15px 40px;
            border-radius: 50px;
            font-size: 18px;
            font-weight: bold;
        }

    </style>
</head>

<body>

<div class="left">
    <h1>THE DAILY <br> INSIGHT </h1>
    <div class="mt-5">
        <a href="{{ route('login') }}" class="btn btn-light btn-custom text-primary me-3">MASUK</a>
        <a href="{{ route('register') }}" class="btn btn-outline-light btn-custom">DAFTAR</a>
    </div>
</div>

<div class="right">
    <div class="circle-stack">
        <div class="circle"></div>
        <div class="circle"></div>
        <div class="circle"></div>
    </div>
    <p style="font-weight:600;">Portal manajemen berita & approval sistem</p>
</div>

</body>
</html>
