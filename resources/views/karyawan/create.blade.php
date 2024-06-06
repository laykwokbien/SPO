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
    <div class="container mt-5">
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
            <button class="btn btn-primary" type="submit" id="submit">Tambahkan</button>
        </form>
    </div>
@endsection
