@extends('template.master')

@section('content')
{{-- Alerts --}}
<div class="container-fluid position-absolute w-100 justify-content-center">
    @if (session()->has('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
</div>
{{-- Content --}}
<div class="container-fluid">
    <a href="{{ url('/karyawan/create') }}" class="btn btn-primary mt-2">Create</a>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nama</th>
                <th scope="col">Jabatan</th>
                <th scope="col">Email</th>
                <th scope="col">Updated</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($page['data'] as $row)
                <tr>
                    <td> {{ $row['id'] }} </td>
                    <td> {{ $row['nama'] }} </td>
                    <td> {{ $row['jabatan'] }} </td>
                    <td> {{ $row['email'] }} </td>
                    <td> {{ $row['updated_at'] }} </td>
                    <td><a href="{{ url("/karyawan/update/{{ $row['id'] }}") }}" class="btn btn-warning">Update</a></td>
                    <td><a href="{{ url("/karyawan/delete/{{ $row['id'] }}") }}" class="btn btn-danger">Delete</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection