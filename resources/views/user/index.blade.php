@extends('template.master')

@section('content')
    {{-- Alerts --}}
    <div class="container-fluid position-absolute w-100 d-flex justify-content-center">
        @if (session()->has('success'))
            <div class="alert alert-success w-25">{{ session('success') }}</div>
        @endif
    </div>
    {{-- Content --}}
    <div class="container-fluid mt-5 mt-sm-4">
        <a href="{{ url('/register') }}" class="btn btn-primary mt-4"><i class="bi bi-person-fill-add"></i> Create</a>
        <div class="table-responsive">
            <table class="table mt-4">
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
                        <tr>
                            <td> {{ $loop->iteration }} </td>
                            <td> {{ $row->username }} </td>
                            <td>
                                @if ($row->isData != null)
                                    {{ $row->isData->email }}
                                @else
                                    {{ 'NOT REGISTERED' }}
                                @endif
                            </td>
                            <td>
                                @if ($row->isData != null)
                                    {{ $row->isData->jabatan }}
                                @else
                                    {{ 'NOT REGISTERED' }}
                                @endif
                            </td>
                            <td>
                                @if ($row->isData != null)
                                    {{ $row->isData->status }}
                                @else
                                    {{ 'NOT REGISTERED' }}
                                @endif
                            </td>
                            </td>
                            <td>
                                <a href="/user/update/{{ $row['id'] }}"
                                    class="btn btn-warning @if ($row->isData == null) {{ 'disabled' }} @endif">Update</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div style="bottom: 0" class="d-flex position-absolute justify-content-center w-75">
                {{ $page['data']->links() }}
            </div>
        </div>
    </div>
@endsection
