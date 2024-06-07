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
                    @foreach ($page['karyawan'] as $row)
                        <option @if ($row['id'] == $page['data']['karyawan_id']) {{ 'selected' }} @endif value="{{ $row->id }}">{{ $row->nama }}</option>
                    @endforeach
                </datalist>
            </div>
            <div class="mb-3">
                <label for="date" class="form-label">Tanggal: </label>
                <input type="date" name="date" id="date" class="form-control" value="{{ $page['data']->tanggal }}">
            </div>
            <div class="mb-3">
                <label for="waktumasuk" class="form-label">Jam Masuk: </label>
                <input type="time" class="form-control" name="waktumasuk" id="waktumasuk" value="{{ $page['data']['waktu_masuk'] }}">
            </div>
            <div class="mb-3">
                <label for="waktukeluar" class="form-label">Jam Keluar: </label>
                <input type="time" class="form-control" name="waktukeluar" id="waktukeluar" value="{{ $page['data']['waktu_keluar'] }}">
            </div>
            <button class="btn btn-primary" type="submit" id="submit">update</button>
        </form>
    </div>
    <a href="{{ url('/presence') }}" class="form-back"><i class='arrowleft-tail'></i>Back</a>
@endsection
