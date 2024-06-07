@extends('template.master')

@section('content')
    <div class="container-fluid position-absolute w-100 d-flex justify-content-center mt-3">
        @if (session()->has('false'))
            <div class="alert alert-danger w-25"> {{ session('false') }} </div>
        @endif
        @if (session()->has('alerts'))
            @foreach (session('alerts') as $fails)
                @foreach ($fails as $messages)
                    <div class="alert alert-danger"> {{ $messages }} </div>
                @endforeach
            @endforeach
        @endif
    </div>
    <div class="container mt-4">
        @if ($page['update'] == false)
            @foreach ($page['data'] as $row)
                @if ($row->isAccount->id == Auth::user()->id)
                    <p>Username: {{ Auth::user()->username }}</p>
                    <p>Name : {{ $row->nama }}</p>
                    <p>Email : {{ $row->email }}</p>
                    <p>Jabatan : {{ $row->jabatan }}</p>
                    <p>Status : {{ $row->status }}</p>
                    <a href="/personal/update/{{ $row->id }}" class="btn btn-warning">Updated Data</a>
                @endif
            @endforeach
        @endif
        @if ($page['update'] == true)
            <form class="mt-5" method="post">
                @csrf
                <div class="mb-3">
                    <label for="username" class="form-label">Username: </label>
                    <input type="text" class="form-control" name="username" id="username"
                        value="{{ $page['data']->username }}">
                </div>
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama: </label>
                    <input type="text" class="form-control" name="nama" id="nama"
                        value="{{ $page['data']->isData->nama }}">
                </div>
                <div class="mb-3">
                    <label for="jabatan" class="form-label">Jabatan: </label>
                    <input type="text" class="form-control" name="jabatan" id="jabatan"
                        value="{{ $page['data']->isData->jabatan }}">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email: </label>
                    <input type="email" class="form-control" name="email" id="email"
                        value="{{ $page['data']->isData->email }}">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password: </label>
                    <input type="password" class="form-control" name="password" id="password">
                </div>
                <div class="mb-3">
                    <label for="confirmpass" class="form-label">Orginal Password: </label>
                    <input type="password" class="form-control" name="confirmpass" id="confirmpass">
                </div>
                <button class="btn btn-primary" type="submit" id="submit">Perbarui</button>
            </form>
        @endif
    </div>

@endsection
