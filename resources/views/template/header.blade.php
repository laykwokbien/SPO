<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-icons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <title>SPO</title>
</head>

<body class="d-flex">
    <header class="position-relative">
        @if ($page['name'] != 'auth' && $page['name'] != 'home')
            @if (Auth::check())
                <nav class="d-flex flex-column align-items-center nav">
                    <div class="nav-brand mb-3 mt-2"><img
                            src="{{ asset('assets/images/company_logo_no_background.png') }}" alt=""></div>
                    <ul style="margin: 0; padding: 0" class="nav-list d-flex flex-column gap-4 text-center w-100">
                        <li class="nav-item">
                            <div id="extendbtn"> Hello, {{ Auth::user()->username }} <i id="arrowleft"></i> <i
                                    id="arrowright"></i></div>
                            <ul id="menu" data-extended="false">
                                <li class="nav-item">
                                    <a class="nav-link text-black" href="{{ url('/personal') }}"><i
                                            class="bi bi-clipboard-fill"></i>
                                        Personal
                                        Info</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-black" href="{{ url('/logout') }}"><i
                                            class="bi bi-box-arrow-left"></i>
                                        Logout</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/dashboard') }}" class="nav-link text-black"><i
                                    class="bi bi-house-door-fill"></i>
                                Home</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/jadwal') }}" class="nav-link text-black"><i
                                    class="bi bi-calendar2-check-fill"></i>
                                Jadwal</a>
                        </li>
                        @if (Auth::user()->role == 'administrator')
                            <li class="nav-item">
                                <a href="{{ url('/manage') }}" class="nav-link text-black"><i
                                        class="bi bi-person-circle"></i>
                                    User</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('/karyawan') }}" class="nav-link text-black"><i
                                        class="bi bi-people-fill"></i>
                                    Karyawan</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('/presence') }}" class="nav-link text-black"><i
                                        class="bi bi-file-post-fill"></i>
                                    Presensi Karyawan</a>
                            </li>
                        @endif
                    </ul>
                </nav>
            @endif
        @endif
    </header>
