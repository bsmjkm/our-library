<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link href="{{ asset('img/logo.png') }}" rel="icon">
    
    <title>OUR-Library</title>

    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    
    <link href="{{ asset('css/ruang-admin.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">

    <style>
        .blur-login {
            background-color: rgba(255, 255, 255, 0.7); 
            backdrop-filter: blur(6px);
            -webkit-backdrop-filter: blur(6px);
            border-radius: 15px;
            padding: 30px;
            transition: all 0.3s ease;
            transform: scale(1);
        }

        .blur-login:hover {
            background-color: rgba(255, 255, 255, 0.95); 
            transform: scale(1.05);
            box-shadow: 0 10px 20px rgba(30, 58, 138, 0.3);
        }
    </style>
</head>
<body style="background-image: url('{{ asset('img/bg-perpus.jpg') }}'); background-size: cover; background-repeat: no-repeat; background-position: center; min-height: 100vh; font-family: 'Nunito', sans-serif;">

<div class="header" style="background-color: rgba(15, 23, 42, 0.85); min-height: 100vh; padding: 50px 0; color: #fff; text-align: center; display: flex; flex-direction: column; justify-content: center;">
    
        @yield('content') 
   
</div>

</body>
</html>