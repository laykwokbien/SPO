@extends('template.master')

@section('content')
    <div class="container row mt-3 gap-2 d-flex justify-content-center">
        <div class="col-12">
            <p class="display-6">Jadwal Presensi</p>
            <table class="table table-info table-striped">
                <thead>
                    <th scope="col">#</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Jam Masuk</th>
                    <th scope="col">Jam Keluar</th>
                </thead>
                <tbody>
                    @foreach ($page['jadwal'] as $item => $presensi)
                        @if (Auth::user()->id == $presensi->isKaryawan->password)
                            <tr>
                                <td>{{ $item + $page['jadwal']->firstItem() }}</td>
                                <td> {{ $presensi->tanggal }} </td>
                                <td> {{ $presensi->waktu_masuk }} </td>
                                <td> {{ $presensi->waktu_keluar }} </td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-12">
            <p class="display-6">Jadwal Hadir</p>
            <table class="table table-info striped">
                <thead>
                    <th scope="col">#</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Jam Masuk</th>
                    <th scope="col">Jam Keluar</th>
                </thead>
                <tbody>
                    @foreach ($page['attendance'] as $item => $row)
                        <tr>
                            <td> {{ $item + $page['attendance']->firstItem() }} </td>
                            <td> {{ $row->date }} </td>
                            <td>
                                @if ($row->time_in != null)
                                    {{ $row->time_in }}
                                @else
                                    {{ 'NOT REGISTERED' }}
                                @endif
                            </td>
                            <td>
                                @if ($row->time_out != null)
                                    {{ $row->time_out }}
                                @else
                                    {{ 'NOT REGISTERED' }}
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div style="bottom: 0" class="d-flex position-absolute justify-content-center w-75">
                {{ $page['jadwal']->links() }}
            </div>
        </div>
    </div>
@endsection
