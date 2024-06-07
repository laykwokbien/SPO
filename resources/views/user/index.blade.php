@extends('template.master')

@section('content')
    {{-- Alerts --}}
    <div class="container-fluid position-absolute w-100 d-flex justify-content-center">
        @if (session()->has('success'))
            <div class="alert alert-success w-25">{{ session('success') }}</div>
        @endif
    </div>
    {{-- Content --}}
    <div class="container-fluid">
        <a href="{{ url('/register') }}" class="btn btn-primary mt-4"><i class="bi bi-person-fill-add"></i> Create</a>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Username</th>
                    <th scope="col">Email</th>
                    <th scope="col">Jabatan</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($page['data'] as $row)
                    @if ($row->isData != null)
                    <tr>
                        <td> {{ $loop->iteration }} </td>
                        <td> {{ $row->username }} </td>
                        <td> {{ $row->isData->email }} </td>
                        <td> {{ $row->isData->jabatan }} </td>
                        <td> {{ $row->isData->status }} </td>
                        <td>
                            <a href="/user/update/{{ $row['id'] }}" class="btn btn-warning">Update</a>
                        </td>
                    </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
    </div>
@endsection