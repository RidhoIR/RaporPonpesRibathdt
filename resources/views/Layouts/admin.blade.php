<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{asset('assets/images/logoponpes.png')}}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">


    <!-- DataTables CSS -->
    <link href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">


    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }

        .sidebar {
            background-color: #4D44B5;
            min-height: 100vh;
            min-width: 40vh;
        }

        .sidebar a {
            color: white;
            display: block;
            padding: 15px;
            text-decoration: none;
            font-weight: 500;
        }

        .sidebar a:hover, .sidebar a.active {
            background-color: #F3F4FF;
            border-top-left-radius: 25px;
            border-bottom-left-radius: 25px;
            color: #4D44B5;
        }

        .main-content {
            background-color: #F3F4FF;
            padding: 20px;
            width: 100%;
        }

        .card {
            background-color: white;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 20px;
        }

        .stat-card {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            border-radius: 8px;
            color: white;
            padding: 20px;
            margin-right: 15px;
            margin-bottom: 15px;
        }

        .stat-card i {
            font-size: 36px;
            margin-bottom: 10px;
        }

        /* Custom icon size */
        /* .icon-lg {
            font-size: 48px;
        }

        .icon-md {
            font-size: 36px;
        }

        .icon-sm {
            font-size: 24px;
        } */
    </style>
</head>

<body>
    <div class="d-flex flex-column flex-lg-row">
        <div class="sidebar pt-3 ps-3 pb-3 d-flex flex-column">
            <div class="text-center mb-4 pe-3">
                <img src="/path/to/logo.png" alt="Logo" class="img-fluid" style="max-width: 100px;">
                <h4 class="text-white">Ribath Daruttauhid</h4>
            </div>
            <div class="d-flex flex-column">
                <a href="{{route('home')}}" class="d-flex align-items-center {{ Request::is('home') ? 'active' : '' }}">
                    <i class="bi bi-house icon-lg" style="margin-right: 15px; font-size:20px;"></i>
                    <span>Dashboard</span>
                </a>
                <a href="{{ route('santri.index') }}" class="d-flex align-items-center {{ Request::is('santri') ? 'active' : '' }}">
                    <i class="bi bi-person-badge-fill icon-md" style="margin-right: 15px; font-size:20px;"></i>
                    Santri
                </a>
                <a href="{{ route('mapel.index') }}" class="d-flex align-items-center {{ Request::is('mapel') ? 'active' : '' }}">
                    <i class="bi bi-book icon-sm" style="margin-right: 15px; font-size:20px;"></i>
                    Mata Pelajaran
                </a>
                <a href="#" class="d-flex align-items-center {{ Request::is('ekstrakurikuler') ? 'active' : '' }}">
                    <i class="bi bi-emoji-smile" style="margin-right: 15px; font-size:20px;"></i>
                    Ekstrakurikuler
                </a>
                <a href="#" class="d-flex align-items-center {{ Request::is('kurikulum*') ? 'active' : '' }}">
                    <i class="bi bi-card-checklist" style="margin-right: 15px; font-size:20px;"></i>
                    Kurikulum
                </a>
                <a href="#" class="d-flex align-items-center {{ Request::is('raport*') ? 'active' : '' }}">
                    <i class="bi bi-file-earmark-text" style="margin-right: 15px; font-size:20px;"></i>
                    Raport
                </a>
                <a href="#" class="d-flex align-items-center {{ Request::is('user*') ? 'active' : '' }}">
                    <i class="bi bi-people" style="margin-right: 15px; font-size:20px;"></i>
                    User
                </a>
                <a href="#" class="d-flex align-items-center {{ Request::is('chat*') ? 'active' : '' }}">
                    <i class="bi bi-chat" style="margin-right: 15px; font-size:20px;"></i>
                    Chat
                </a>
                <a href="#" class="d-flex align-items-center {{ Request::is('lastest-activity*') ? 'active' : '' }}">
                    <i class="bi bi-clock-history" style="margin-right: 15px; font-size:20px;"></i>
                    Latest Activity
                </a>
                <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">

            </div>
        </div>
        <div class="main-content flex-grow-1">
            @yield('content')
        </div>
    </div>
</body>

</html>
