<!DOCTYPE html>
<html lang="en">

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
    <header>
        @if ($page['name'] != 'auth')
            <nav class="vh-100 d-flex flex-column align-items-center">
                <div class="nav-brand mb-3 mt-2"><img src="{{ asset('assets/images/company_logo.jpg') }}" alt=""></div>
                <ul style="margin: 0; padding: 0" class="nav-list d-flex flex-column gap-4 text-center">
                    <li class="nav-item">
                        <div class="account"></div>
                        <ul class="menu">
                            <li class="nav-item">
                                <a href="#"><i class="bi bi-gear-fill"></i>Settings</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('/logout') }}"><i class="bi bi-box-arrow-left"></i>Logout</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/dashboard') }}" class="nav-link" >Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/dashboard') }}" class="nav-link" >Jadwal</a>
                    </li>
                    @if (Auth::user()->role == 'administrator')
                        <li class="nav-item">
                            <a href="{{ url('/karyawan') }}" class="nav-link">Karyawan</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/presence') }}" class="nav-link" >Presensi Karyawan</a>
                        </li>
                    @endif
                </ul>
            </nav>
        @endif
    </header>
