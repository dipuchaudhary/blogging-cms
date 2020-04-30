@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-header">
            Edit Site Setting
        </div>
        <div class="card-body">
            @include('admin.partials.errors')
            <form action="{{ route('setting.update') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="name">Site Name</label>
                    <input type="text" name="site_name" id="name" class="form-control" value="{{$setting->site_name}}">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="form-control" value="{{$setting->email}}">
                </div>
                <div class="form-group">
                    <label for="contact">Contact </label>
                    <input type="text" name="contact" id="contact" class="form-control" value="{{$setting->contact}}">
                </div>
                <div class="form-group">
                    <label for="email">Address</label>
                    <input type="text" name="address" class="form-control" value="{{$setting->address}}">
                </div>
                <button type="submit" class="btn btn-primary">Update Setting</button>
            </form>
        </div>
    </div>
@endsection
