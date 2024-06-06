@extends('template.master')

@section('content')
    <div class="container">
        <p>Hello, {{ Auth::user()->username }}</p>
        <div class="row information gap-4 mb-4">
            <div class="col-2">
                <p>Total Karyawan</p>
                <p>500</p>
            </div>
            <div class="col-2">
                <p>Total Presensi</p>
                <p>250</p>
            </div>
        </div>
        <p style="font-size: 28px">Jadwal hari ini</p>
        <div class="row d-flex justify-content-center">
            <div class="col-md-6 bg-success currentschedule">
                <p>Jam Masuk</p>
                <p>7.00</p>
                <button class="btn btn-outline-light">Hadir</button>
            </div>
            <div class="col-md-6 bg-danger currentschedule">
                <p>Jam Keluar</p>
                <p>15.00</p>
                <button class="btn btn-outline-light">Hadir</button>
            </div>
        </div>
    </div>
@endsection
