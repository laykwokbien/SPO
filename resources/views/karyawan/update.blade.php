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
                <input type="text" class="form-control" name="nama" id="nama" value="{{ $page['data']->nama }}">
            </div>
            <div class="mb-3">
                <label for="jabatan" class="form-label">Jabatan: </label>
                <input type="text" class="form-control" name="jabatan" id="jabatan" value="{{ $page['data']->jabatan }}">
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">Status: </label>
                <select name="status" id="status" class="form-select">
                    <option @if ($page['data']->status == 'Active') {{ 'selected' }} @endif value="Active">Active</option>
                    <option @if ($page['data']->status == 'Inactive') {{ 'selected' }} @endif value="Inactive">Inactive</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email: </label>
                <input type="email" class="form-control" name="email" id="email" value="{{ $page['data']->email }}">
            </div>
            @if (Auth::user()->role == 'karyawan')
                <div class="mb-3">
                    <label for="confirmpass" class="form-label">Original Password: </label>
                    <input type="password" class="form-control" name="confirmpass" id="confirmpass">
                </div>
            @endif
            @if (Auth::user()->role != 'administrator')
                <div class="mb-3">
                    <label for="password" class="form-label">New Password: </label>
                    <input type="password" class="form-control" name="password" id="password">
                    <input type="checkbox" name="checkbox" id="checkbox" class="form-check-input">
                    <label for="checkbox" class="form-check-label">Show Password</label>
                </div>
            @endif
            <button class="btn btn-primary" type="submit" id="submit">Tambahkan</button>
        </form>
    </div>
    <a href="{{ url('/karyawan') }}" class="form-back"><i class='arrowleft-tail'></i>Back</a>
@endsection