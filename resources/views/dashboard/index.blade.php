@extends('template.master')

@section('content')
    <div class="container">
        <p>Hello, {{ Auth::user()->username }}</p>
        <div class="row">
            <div class="col-md-6">
                
            </div>
            <div class="col-md-6">

            </div>
        </div>
    </div>
@endsection