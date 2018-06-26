@extends('layouts.app')

@section('content')
    @include('destiny::banner')

    <div class="container">
        <div class="row">
            <div class="col-9">
                <div class="card">
                    <div class="card-body">
                        Email: {{$user->email}}
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="card">
                    <div class="card-body">
                        sadas
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
