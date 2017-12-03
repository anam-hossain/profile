@extends('app')

@section('title', 'Update user')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <p><a href="{{ route('users.show', $user) }}">Show profile</a></p>
            <update-user :id="{{ $user->id }}"></update-user>
        </div>
    </div>
@endsection