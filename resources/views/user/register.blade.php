@extends('template.master')

@section('content')
    <div class="position-relative">
        {{-- Alerts --}}
        <div class="container-fluid position-absolute mt-5 d-flex justify-content-center" style="z-index: 9999">
            @if (session()->has('fail'))
                <div class="alert alert-danger w-25" role="alert"> {{ session('fail') }} </div>
            @endif
            @if (session()->has('success'))
                <div class="alert alert-success w-25" role="alert"> {{ session('success') }} </div>
            @endif
        </div>
        {{-- Register Container --}}
        <div class="bg-auth vh-100 w-100">
            <div style="backdrop-filter: blur(5px);"
                class="vh-100 vw-100 d-flex flex-sm-column justify-content-sm-start align-items-sm-start justify-content-center align-items-center">
                <div class="position-absolute mt-3 col-xl-3 col-lg-4 col-sm-6 d-sm-flex d-none justify-content-center">
                    <img class="auth-logo" src="{{ asset('assets/images/company_logo_no_background.png') }}" alt="Company's Logo" draggable="false">
                </div>
                <form class="col-xl-3 col-lg-4 col-sm-6 d-flex flex-column justify-content-center px-5 auth" method="post">
                    @csrf
                    <h1>Register</h1>
                    <div class="mb-3">
                        <label for="username" class="form-label">Username:</label>
                        <input type="text" class="form-control" name="username" id="username">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password:</label>
                        <input type="password" class="form-control mb-2" name="password" id="password">
                        <input type="checkbox" name="checkbox" id="checkbox" class="form-check-input">
                        <label for="checkbox" class="form-check-label">Show Password</label>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary">Register</button>
                </form>
            </div>
        </div>
    </div>
@endsection
