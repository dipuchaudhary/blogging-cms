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
               <th>content</th>
               </thead>
               <tbody>
               @foreach($posts as $post)
                   <tr>
                       <td>{{$post->name}}</td>
                       <td>{{$post->title}}</td>
                       <td>{{$post->category}}</td>
                       <td>
                           <a href="{{ route('posts.edit',$post->id) }}" class="btn btn-info btn-sm">Edit</a>
                           <a href="{{ route('posts.destroy',$post->id) }}" class="btn btn-danger btn-sm">delete</a>
                       </td>
                   </tr>
               @endforeach
               </tbody>

           </table>
       </div>
   </div>
    @endsection
