@extends('template.master')

@section('content')
    <div class="container">
        <p class="dashboard-heads mt-5">Hello, {{ Auth::user()->username }}</p>
        <div class="row information gap-4 mb-4 justify-content-center justify-content-md-start">
            <div class="col-xl-2 col-lg-3 col-sm-5 col-11 info-child">
                <p>Total Karyawan</p>
                <p>{{ count($page['karyawan']) }}</p>
            </div>
            <div class="col-xl-2 col-lg-3 col-sm-5 col-11 info-child">
                <p>Total Presensi</p>
                <p>{{ count($page['presensi']) }}</p>
            </div>
            <div class="col-xl-2 col-lg-3 col-sm-5 col-11 info-child">
                <p>Total User</p>
                <p>{{ count($page['user']) }}</p>
            </div>
        </div>
        <p class='dashboard-heads'>Jadwal hari ini</p>
        <div class="row d-flex justify-content-center">
            <div class="col-md-6 col-11 bg-success currentschedule">
                <p>Jam Masuk</p>
                @foreach ($page['presensi'] as $time)
                    @foreach ($page['karyawan'] as $karyawan)
                        @if (Auth::user()->id == $karyawan->isAccount->id &&
                                $time->isKaryawan->id == $karyawan->id &&
                                $page['currentdate'] == $time->tanggal)
                            <p id="jammasuk"> {{ $time->waktu_masuk }} </p>
                            <form action="/hadir/{{ $time->id }}" method="post">
                                @csrf
                                <button type="submit" name="submit" class="btn btn-outline-light">Hadir</button>
                            </form>
                        @endif
                    @endforeach
                @endforeach
            </div>
            <div class="col-md-6 col-11 bg-danger currentschedule">
                <p>Jam Keluar</p>
                @foreach ($page['presensi'] as $time)
                    @foreach ($page['karyawan'] as $karyawan)
                        @if (Auth::user()->id == $karyawan->isAccount->id &&
                                $time->isKaryawan->id == $karyawan->id &&
                                $page['currentdate'] == $time->tanggal)
                            <p id="jamkeluar"> {{ $time->waktu_keluar }} </p>
                            <form action="/keluar/{{ $time->id }}" method="post">
                                @csrf
                                <button type="submit" name="submit" class="btn btn-outline-light">Absen</button>
                            </form>
                        @endif
                    @endforeach
                @endforeach
            </div>
        </div>
        <div class="row justify-content-start">
            <p class="mt-4 text-start dashboard-heads">Check Jadwal Anda</p>
            <a href="{{ url('/jadwal') }}" class="btn btn-info col-lg-1 col-sm-2 col-3">Pergi</a>
        </div>
    </div>
@endsection
