@extends('app')

@section('title', 'Profile')

@section('content')
    <div class="well">
        @if ($errors->has('photo'))
            <div class="alert alert-danger" role="alert"><strong>{{ $errors->first('photo') }}</strong></div>
        @endif
        
        <h2>Profile</h2>
        <div class="text-center">
            <img class="img-circle" src="{{ $user->avatar() }}" width="150"></img>
            <p><button class="btn-link" data-toggle="modal" data-target="#upload-photo">Upload photo</button></p>
        </div>
        
        <p><strong>Name:</strong> {{ $user->name }}</p>
        <p><strong>Email:</strong> {{ $user->email }}</p>
        <p><strong>Address:</strong> {{ $user->address }}</p>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="upload-photo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Upload Avatar</h4>
        </div>
        <div class="modal-body">
            @include('users.photos._form')
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
        </div>
    </div>
    </div>
@endsection