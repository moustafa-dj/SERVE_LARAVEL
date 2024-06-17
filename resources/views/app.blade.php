<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>LARA_SERVE</title>

        <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/vendor/bootstrap/css/bootstrap.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/vendor/boxicons/css/boxicons.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/vendor/quill/quill.snow.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/vendor/quill/quill.bubble.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/vendor/remixicon/remixicon.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/vendor/simple-datatables/style.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('style/style.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/style.css') }}">
    </head>
    <body class="font-sans antialiased dark:bg-black dark:text-white/50">
        <nav class="nav" id="header">
            <div class="container">
                <div class="nav-d">
                    <a href="/" class="g">
                        <img src="{{asset('admin/assets/img/logo.png')}}" alt="Logo">
                    </a>
                    <input type="checkbox" id="check"/> 
                    <label for="check" class="checkbtn">
                        <img src="{{asset('img/menu.png')}}" alt="Menu">
                    </label>
                    <ul id="link-ul">
                        @if(Auth::check())
                            <li class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    {{auth()->user()->name}}
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="{{route('client.profile')}}">My Profile</a></li>
                                    <li><a class="dropdown-item" href="{{route('client.logout')}}">Logout</a></li>
                                </ul>
                            </li>
                        @else
                            <li><a href="{{route('client.login')}}">Login</a></li>
                            <li><a href="{{route('client.register')}}">Sign-up</a></li>
                            <li><a href="{{route('client.login')}}">Become an employee</a></li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

            @yield('content')
        <footer class="footer">
            <div class="container">
                <div class="footer-d"> 
                    <div class="f-in">
                        <div class="footer-head">
                        </div>
                        <div class="footer-content">
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <div class="footer-sub">
            <div class="container"> 
                    <p>All rights reserved - 2023 - Ra France</p>
            </div>
        </div>
        <script src="js/home.js"></script>
        <script src="{{ asset('admin/assets/vendor/apexcharts/apexcharts.min.js')}}"></script>
        <script src="{{ asset('admin/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{ asset('admin/assets/vendor/chart.js/chart.umd.js')}}"></script>
        <script src="{{ asset('admin/assets/vendor/echarts/echarts.min.js')}}"></script>
        <script src="{{ asset('admin/assets/vendor/quill/quill.js')}}"></script>
        <script src="{{ asset('admin/assets/vendor/simple-datatables/simple-datatables.js')}}"></script>
        <script src="{{ asset('admin/assets/vendor/tinymce/tinymce.min.js')}}"></script>
        <script src="{{ asset('admin/assets/vendor/php-email-form/validate.js')}}"></script>
        <script src="{{ asset('admin/assets/js/main.js') }}" type="text/javascript"></script>
    </body>
</html>