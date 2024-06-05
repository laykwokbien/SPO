@extends('template.master')

@section('content')
{{-- Alerts --}}

{{-- Login Container --}}
    <div class="vh-100 w-100 d-flex flex-sm-column justify-content-sm-start align-items-sm-start justify-content-center align-items-center">
        <form class="col-xl-3 col-lg-4 col-sm-6 bg-secondary d-flex flex-column justify-content-center px-5" method="post">
            @csrf
            <div class="mb-3">
                <label for="username" class="form-label">Username:</label>
                <input type="text" class="form-control" name="username" id="username">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password:</label>
                <input type="password" class="form-control" name="password" id="password">
                <input type="checkbox" name="checkbox" id="checkbox" class="form-check-input">
                <label for="checkbox" class="form-check-label">Show Password</label>
            </div>
            <button class="btn btn-primary">Login</button>
            <hr>
            <span class="text-center">Don't have a account? <a href="{{ url('/register') }}">Register</a></span>
        </form>
        <div class="col-xl-9 col-lg-8 col-md-6">
            
        </div>
    </div>
@endsection