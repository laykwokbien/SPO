@extends('template.master')

@section('content')
    {{-- Alerts --}}
    <div class="position-absolute">
        @if (session()->has('alerts'))
            @foreach (session('alerts') as $fails)
                @foreach ($fails as $messages)
                    <div class="alert alert-danger"> {{ $messages }} </div>
                @endforeach
            @endforeach
        @endif
    </div>
    {{-- Form --}}
    <div class="container d-flex w-100 justify-content-center mt-5">
        <form class="w-25" method="post">
            @csrf
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Karyawan: </label>
                <input type="text" class="form-control" name="nama" id="nama">
            </div>
            <div class="mb-3">
                <label for="jabatan" class="form-label">Jabatan: </label>
                <input type="text" class="form-control" name="jabatan" id="jabatan">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email: </label>
                <input type="email" class="form-control" name="email" id="email">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password: </label>
                <input type="password" class="form-control" name="password" id="password">
                <input type="checkbox" name="checkbox" id="checkbox" class="form-check-input">
                <label for="checkbox" class="form-check-label">Show Password</label>
            </div>
            <button class="btn btn-primary" type="submit" id="submit">Tambahkan</button>
        </form>
    </div>
    <a href="{{ url('/karyawan') }}" class="form-back"><i class='arrowleft-tail'></i>Back</a>

@endsection
