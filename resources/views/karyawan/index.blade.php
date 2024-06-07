@extends('template.master')

@section('content')
    {{-- Alerts --}}
    <div class="container-fluid position-absolute w-100 d-flex justify-content-center">
        @if (session()->has('success'))
            <div class="alert alert-success w-25">{{ session('success') }}</div>
        @endif
        @if (session()->has('false'))
            <div class="alert alert-danger w-25"> {{ session('false') }} </div>
        @endif
    </div>
    {{-- Content --}}
    <div class="container-fluid">
        <a href="{{ url('/karyawan/create') }}" class="btn btn-primary mt-4">Create</a>
        <table class="table mt-4">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Jabatan</th>
                    <th scope="col">Email</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($page['data'] as $item => $row)
                    <tr>
                        <td> {{ $item + $page['data']->firstItem() }} </td>
                        <td> {{ $row['nama'] }} </td>
                        <td> {{ $row['jabatan'] }} </td>
                        <td> {{ $row['email'] }} </td>
                        <td> {{ $row['status'] }} </td>
                        <td>
                            <a href="/karyawan/update/{{ $row['id'] }}" class="btn btn-warning">Update</a>
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
