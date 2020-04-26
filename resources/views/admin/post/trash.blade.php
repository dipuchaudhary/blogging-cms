@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            posts
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                <th>image</th>
                <th>Title</th>
                <th>category</th>
                <th>Action</th>
                </thead>
                <tbody>
                @foreach($posts as $post)
                    <tr>
                        <td><img src="{{ asset('storage/'.$post->featured_img) }}" alt="" width="100px" height="60px"></td>
                        <td>{{$post->title}}</td>
                        <td>{{$post->category->name}}</td>
                        <td>
                            <a href="{{ route('restore-post',$post->id) }}" class="btn btn-info btn-sm">Restore</a>
                        </td>
                        <td>
                            <form action="{{ route('posts.destroy',$post->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>

            </table>
        </div>
    </div>
@endsection
