@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-header">
            Add new user
        </div>
        <div class="card-body">
            @include('admin.partials.errors')
            <form action="{{ route('users.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" class="form-control">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary">Add User</button>
            </form>
        </div>
    </div>
@endsection
