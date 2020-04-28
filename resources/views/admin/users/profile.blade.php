@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-header">
            Edit profile
        </div>
        <div class="card-body">
            @include('admin.partials.errors')
            <form action="{{ route('user.profile.update') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{$user->name}}">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="form-control" value="{{$user->email}}">
                </div>
                <div class="form-group">
                    <label for="password">New Password</label>
                    <input type="password" name="password" id="password" class="form-control" value="">
                </div>
                <div class="form-group">
                    <label for="email">profile Image</label>
                    <input type="file" name="avatar" id="avatar" class="form-control-file">
                </div>
                <div class="form-group">
                    <label for="email">About me</label>
                    <textarea name="about" cols="4" rows="4" class="form-control">{{$user->profile->about}}</textarea>
                </div>
                <div class="form-group">
                    <label for="facebook">Facebook</label>
                    <input type="text" name="facebook" id="facebook" class="form-control" value="{{$user->profile->facebook}}">
                </div>
                <button type="submit" class="btn btn-primary">Update Profile</button>
            </form>
        </div>
    </div>
@endsection
