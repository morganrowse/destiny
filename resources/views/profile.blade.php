@extends('layouts.app')

@section('content')
    @include('destiny::banner')

    <div class="container">
        <div class="row">
            <div class="col-9">
                <div class="card">
                    <div class="card-body">
                        Email: {{$user->email}}

                        <br>
                        Request: {{route('profile.banner',$user)}}

                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="card">
                    <div class="card-body">
                        @if(auth()->user() === $user->id)
                            edit
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
