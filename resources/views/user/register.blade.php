@extends('template.master')

@section('content')
    {{-- Alerts --}}
    <div class="container">
        @if (session()->has('alerts'))
            @foreach (session('alerts') as $fails)
                @foreach ($fails as $messages)
                    <div class="alert alert-danger"> {{ $messages }} </div>
                @endforeach
            @endforeach
        @endif
    </div>
    {{-- Login Container --}}
    <div class="bg-auth vh-100 w-100">
        <div style="backdrop-filter: blur(5px);"
            class="vh-100 vw-100 d-flex flex-sm-column justify-content-sm-start align-items-sm-start justify-content-center align-items-center">
            <form class="col-xl-3 col-lg-4 col-sm-6 d-flex flex-column justify-content-center px-5" method="post">
                @csrf
                {{-- <div class="mb-3">
                    <label for="eid" class="form-label">Employee ID:</label>
                    <input type="text" class="form-control" name="eid" id="eid">
                </div> --}}
                <div class="mb-3">
                    <label for="email" class="form-label">Email:</label>
                    <input type="text" class="form-control" name="email" id="email">
                </div>
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
                <button type="submit" name="submit" class="btn btn-primary">Register</button>
                <hr>
                <span class="text-center">Already have a account? <a href="{{ url('/login') }}">Login</a></span>
            </form>
        </div>
    </div>
@endsection
