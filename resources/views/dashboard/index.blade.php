@extends('template.master')

@section('content')
    <div class="container">
        <p class="dashboard-heads mt-5">Hello, {{ Auth::user()->username }}</p>
        <div class="row information gap-4 mb-4 justify-content-center justify-content-md-start">
            <div class="col-xl-2 col-lg-3 col-sm-5 col-11 info-child">
                <p>Total Karyawan</p>
                <p>500</p>
            </div>
            <div class="col-xl-2 col-lg-3 col-sm-5 col-11 info-child">
                <p>Total Presensi</p>
                <p>250</p>
            </div>
        </div>
        <p class='dashboard-heads'>Jadwal hari ini</p>
        <div class="row d-flex justify-content-center">                
            <div class="col-md-6 col-11 bg-success currentschedule">
                <p>Jam Masuk</p>
                <p>7.00</p>
                <button class="btn btn-outline-light">Hadir</button>
            </div>
            <div class="col-md-6 col-11 bg-danger currentschedule">
                <p>Jam Keluar</p>
                <p>15.00</p>
                <button class="btn btn-outline-light">Hadir</button>
            </div>
        </div>
        <div class="row justify-content-end">
            <p class="mt-4 text-end dashboard-heads">Check Jadwal Anda</p>
            <a href="{{ url('/jadwal') }}" class="btn btn-info col-lg-1 col-sm-2 col-3">Pergi</a>
        </div>
    </div>
@endsection
