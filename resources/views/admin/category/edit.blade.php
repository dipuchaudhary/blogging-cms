@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-header">
            Edit Category
        </div>
        <div class="card-body">
            @include('admin.partials.errors')
            <form action="{{ route('category.update',$category->id) }}" method="post">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" value="{{$category->name}}" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary">Update Category</button>
            </form>
        </div>
    </div>
@endsection
