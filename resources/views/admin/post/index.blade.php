@extends('layouts.app')

@section('content')
   <div class="d-flex justify-content-end mb-2">
       <a href="{{route('posts.create')}}" class="btn btn-success">Create Post</a>
   </div>
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
                           <a href="{{ route('posts.edit',$post->id) }}" class="btn btn-info btn-sm">Edit</a>
                       </td>
                       <td>
                           <form action="{{ route('posts.destroy',$post->id) }}" method="post">
                               @csrf
                               @method('DELETE')
                               <button class="btn btn-danger btn-sm">Trash</button>
                           </form>
                       </td>
                   </tr>
               @endforeach
               </tbody>

           </table>
       </div>
   </div>
    @endsection
