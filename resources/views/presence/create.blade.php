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
                <label for="idKaryawan" class="form-label">Nama Karyawan:</label>
                <input class="form-control" list="datalistOptions" id="idKaryawan" name="idKaryawan">
                <datalist id="datalistOptions">
                    @foreach ($page['data'] as $row)
                        <option value="{{ $row->id }}">{{ $row->nama }}</option>
                    @endforeach
                </datalist>
            </div>
            <div class="mb-3">
                <label for="date" class="form-label">Tanggal: </label>
                <input type="date" name="date" id="date" class="form-control" min="{{ $page['currentdate'] }}">
            </div>
            <div class="mb-3">
                <label for="waktumasuk" class="form-label">Jam Masuk: </label>
                <input type="time" class="form-control" name="waktumasuk" id="waktumasuk">
            </div>
            <div class="mb-3">
                <label for="waktukeluar" class="form-label">Jam Keluar: </label>
                <input type="time" class="form-control" name="waktukeluar" id="waktukeluar">
            </div>
            <button class="btn btn-primary" type="submit" id="submit">Tambahkan</button>
        </form>
    </div>
    <a href="{{ url('/karyawan') }}" class="form-back"><i class='arrowleft-tail'></i>Back</a>

@endsection
