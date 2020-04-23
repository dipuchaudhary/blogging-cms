@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-header">
            Add new Category
        </div>
        <div class="card-body">
            @include('admin.partials.errors')
            <form action="{{ route('category.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary">Add Category</button>
            </form>
        </div>
    </div>
    @endsection
