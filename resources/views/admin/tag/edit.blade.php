@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-header">
            Edit Tag
        </div>
        <div class="card-body">
            @include('admin.partials.errors')
            <form action="{{ route('tags.update',$tag->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{$tag->name}}">
                </div>
                <button type="submit" class="btn btn-primary">Update Tag</button>
            </form>
        </div>
    </div>
@endsection
