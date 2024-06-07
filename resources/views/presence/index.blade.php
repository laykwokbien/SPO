@extends('template.master')

@section('content')
    {{-- Alerts --}}
    <div class="container-fluid position-absolute w-100 d-flex justify-content-center">
        @if (session()->has('success'))
            <div class="alert alert-success w-25">{{ session('success') }}</div>
        @endif
        @if ($page['delete'] == true)
            <div style="width:250px; background-color: var(--primary-color); border-radius: 20px;"
                class="d-flex flex-column text-white align-items-center py-4 mt-2">
                <p>Apakah kamu yakin ingin <br> menghapus data ini</p>
                <div style="width: 15%" class="d-flex justify-content-around w-100">
                    <a href="{{ url('/karyawan') }}" class="btn btn-primary">No</a>
                    <form method="post">
                        @csrf
                        <button type="submit" name="submit" class="btn btn-danger">Yes</button>
                    </form>
                </div>
            </div>
        @endif
    </div>
    {{-- Content --}}
    <div class="container-fluid mt-4">
        <a href="{{ url('/presence/create') }}" class="btn btn-primary">Create</a>
        <a href="{{ url('/presence/export') }}" class="btn btn-success">Export</a>
        <table class="table mt-4">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama Karyawan</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Jam Masuk</th>
                    <th scope="col">Jam Keluar</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @php
                @endphp
                @foreach ($page['data'] as $item => $row)
                    <tr>
                        <td> {{ $item + $page['data']->firstItem() }} </td>
                        <td> {{ $row->isKaryawan->nama }} </td>
                        <td> {{ $row['tanggal'] }} </td>
                        <td> {{ $row['waktu_masuk'] }} </td>
                        <td> {{ $row['waktu_keluar'] }} </td>
                        <td>
                            <a href="/presence/update/{{ $row['id'] }}" class="btn btn-warning">Update</a>
                            <a href="/presence/delete/{{ $row['id'] }}" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div style="bottom: 0" class="d-flex position-absolute justify-content-center w-75">
            {{ $page['data']->links() }}
        </div>
    </div>
@endsection
