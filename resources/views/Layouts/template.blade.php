<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ asset('assets/images/logoponpes.png') }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="{{ asset('assets/css/pace.min.css') }}" rel="stylesheet" />
    <script src="{{ asset('assets/js/pace.min.js') }}"></script>

    <!--plugins-->
    <link href="{{ asset('assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/simplebar/css/simplebar.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/metismenu/css/metisMenu.min.css') }}" rel="stylesheet" />

    <!-- CSS Files -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/bootstrap-extended.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/icons.css') }}" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet" />

    <!--Theme Styles-->
    <link href="{{ asset('assets/css/dark-theme.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/semi-dark.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/header-colors.css') }}" rel="stylesheet" />

    <!-- DataTables CSS -->
    <link href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Toastify JS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <!-- Scripts -->
    {{-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) --}}
</head>

<body>
    <div class="wrapper">
        <!--start sidebar -->
        <aside class="sidebar-wrapper" data-simplebar="true">
            <div class="sidebar-header">
                <div>
                    <img src="{{ asset('assets/images/logoponpes.png') }}" class="logo-icon" alt="logo icon">
                </div>
                <div>
                    <h4 class="logo-text">Ribath Daruttauhid</h4>
                </div>
            </div>
            <hr />
            <!--navigation-->
            <ul class="metismenu" id="menu">
                <li>
                    <a href="{{ route('admin.dashboard') }}">
                        <div class="parent-icon">
                            <ion-icon name="home-outline"></ion-icon>
                        </div>
                        <div class="menu-title">Dashboard</div>
                    </a>
                </li>
                <li>
                    <a href="{{ route('santri.index') }}">
                        <div class="parent-icon">
                            <ion-icon name="people"></ion-icon>
                        </div>
                        <div class="menu-title">Santri</div>
                    </a>
                </li>
                <li>
                    <a href="javascript:;" class="has-arrow">
                        <div class="parent-icon">
                            <ion-icon name="book-outline"></ion-icon>
                        </div>
                        <div class="menu-title">Mata Pelajaran</div>
                    </a>
                    <ul>
                        <li> <a href="{{ route('mapel.index.sughro') }}">
                                <ion-icon name="ellipse-outline"></ion-icon>Sughro
                            </a>
                        </li>
                        <li> <a href="{{ route('mapel.index.kubro') }}">
                                <ion-icon name="ellipse-outline"></ion-icon>Kubro
                            </a>
                        </li>
                        <li> <a href="{{ route('mapel.index.wustho') }}">
                                <ion-icon name="ellipse-outline"></ion-icon>Wustho
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="{{ route('classroom.index') }}">
                        <div class="parent-icon">
                            <ion-icon name="school"></ion-icon>
                        </div>
                        <div class="menu-title">Kelas</div>
                    </a>
                </li>
                {{-- <li>
                    <a href="{{ route('rapor.index') }}">
                        <div class="parent-icon">
                            <ion-icon name="file-tray-stacked"></ion-icon>
                        </div>
                        <div class="menu-title">Data Raport</div>
                    </a>
                </li> --}}
                {{-- <li class="menu-label">UI Elements</li> --}}
                <li class="menu-label">Data Raport</li>
                <li>
                    <a href="javascript:;" class="has-arrow">
                        <div class="parent-icon">
                            <ion-icon name="briefcase-outline"></ion-icon>
                        </div>
                        <div class="menu-title">Raport</div>
                    </a>
                    <ul>
                        <li> <a href="{{ route('rapor.index.sughro') }}">
                                <ion-icon name="ellipse-outline"></ion-icon>Sughro
                            </a>
                        </li>
                        <li> <a href="{{ route('rapor.index.kubro') }}">
                                <ion-icon name="ellipse-outline"></ion-icon>Kubro
                            </a>
                        </li>
                        <li> <a href="{{ route('rapor.index.wustho') }}">
                                <ion-icon name="ellipse-outline"></ion-icon>Wustho
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!--end navigation-->
        </aside>
        <!--end sidebar -->

        <!--start top header-->
        <header class="top-header">
            <nav class="navbar navbar-expand gap-3">
                <div class="toggle-icon">
                    <ion-icon name="menu-outline"></ion-icon>
                </div>

                <form class="searchbar">
                    <div class="position-absolute top-50 translate-middle-y search-icon ms-3">
                        <ion-icon name="search-outline"></ion-icon>
                    </div>
                    <input class="form-control" type="text" placeholder="Search for anything">
                    <div class="position-absolute top-50 translate-middle-y search-close-icon">
                        <ion-icon name="close-outline"></ion-icon>
                    </div>
                </form>
                <div class="top-navbar-right ms-auto">

                    <ul class="navbar-nav align-items-center">
                        <li class="nav-item">
                            <a class="nav-link mobile-search-button" href="javascript:;">
                                <div class="">
                                    <ion-icon name="search-outline"></ion-icon>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link dark-mode-icon" href="javascript:;">
                                <div class="mode-icon">
                                    <ion-icon name="moon-outline"></ion-icon>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item dropdown dropdown-user-setting">
                            <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="javascript:;"
                                data-bs-toggle="dropdown">
                                <div class="user-setting">
                                    <img src="{{ asset('assets/images/avatars/06.png') }}" class="user-img"
                                        alt="">
                                </div>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li>
                                    <a class="dropdown-item" href="javascript:;">
                                        <div class="d-flex flex-row align-items-center gap-2">
                                            <img src="{{ asset('assets/images/avatars/06.png') }}" alt=""
                                                class="rounded-circle" width="54" height="54">
                                            <div class="">
                                                <h6 class="mb-0 dropdown-user-name">{{ Auth::user()->name }} </h6>
                                                <small
                                                    class="mb-0 dropdown-user-designation text-secondary">Administrator</small>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li>
                                    <a class="dropdown-item" href="javascript:;">
                                        <div class="d-flex align-items-center">
                                            <div class="">
                                                <ion-icon name="person-outline"></ion-icon>
                                            </div>
                                            <div class="ms-3"><span>Profile</span></div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                        <div class="d-flex align-items-center">
                                            <div class="">
                                                <ion-icon name="log-out-outline"></ion-icon>
                                            </div>
                                            <div class="ms-3"><span>{{ __('Logout') }}</span></div>
                                        </div>
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        class="d-none">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </li>

                    </ul>

                </div>
            </nav>
        </header>
        <!--end top header-->


        <!-- start page content wrapper-->
        <div class="page-content-wrapper">
            <!-- start page content-->
            <div class="page-content">
                @yield('content')
            </div>
            <!-- end page content-->
        </div>
        <!--end page content wrapper-->


        <!--Start Back To Top Button-->
        <a href="javaScript:;" class="back-to-top"><ion-icon name="arrow-up-outline"></ion-icon></a>
        <!--End Back To Top Button-->

        <!--start switcher-->
        <!--end switcher-->


        <!--start overlay-->
        <div class="overlay nav-toggle-icon">
        </div>
        <!--end overlay-->

    </div>
    <!--end wrapper-->


    <style>
        .toastify {
            width: 300px !important;
            /* Atur lebar notifikasi */
            height: 50px !important;
            /* Atur tinggi notifikasi */
            font-size: 16px;
            /* Atur ukuran font */
            padding: 10px;
            /* Atur padding dalam notifikasi */
            display: flex;
            align-items: center;
            justify-content: space-between
        }
    </style>



    <!-- JS Files-->
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/simplebar/js/simplebar.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/metismenu/js/metisMenu.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <!--plugins-->
    <script src="{{ asset('assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatable/js/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('assets/js/table-datatable.js') }}"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            @if (Session::has('success'))
                Toastify({
                    text: "{{ Session::get('success') }}",
                    duration: 2000,
                    destination: "https://github.com/apvarun/toastify-js",
                    newWindow: true,
                    close: true,
                    gravity: "top", // `top` or `bottom`
                    position: "right", // `left`, `center` or `right`
                    stopOnFocus: true, // Prevents dismissing of toast on hover
                    style: {
                        background: "green",
                    },
                    onClick: function() {} // Callback after click
                }).showToast();
            @endif

            @if (Session::has('error'))
                Toastify({
                    text: "{{ Session::get('error') }}",
                    duration: 2000,
                    newWindow: true,
                    close: true,
                    gravity: "top", // top or bottom
                    position: "right", // left, center or right
                    stopOnFocus: true, // Prevents dismissing of toast on hover
                    style: {
                        background: "red",
                    },
                    onClick: function() {} // Callback after click
                }).showToast();
            @endif
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#classroom-select').multiselect({
                includeSelectAllOption: true,
                enableFiltering: true,
                buttonWidth: '100%',
                nonSelectedText: '-- Pilih Kelas --'
            });
        });
    </script>


    <!-- Main JS-->
    <script src="{{ asset('assets/js/main.js') }}"></script>
</body>

</html>
