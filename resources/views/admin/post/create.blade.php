@extends('layouts.app')
@section('content')

   <div class="card">
       <div class="card-header">
           Create a new post
       </div>
       <div class="card-body">
           @include('admin.partials.errors')
           <form action="{{route('posts.store')}}" method="post" enctype="multipart/form-data">
               @csrf
               <div class="form-group">
                   <label for="title">Title</label>
                   <input type="text" name="title" id="title" class="form-control">
               </div>


               <div class="form-group">
                   <label for="content">Content</label>
                   <input id="description" type="hidden" name="content">
                   <trix-editor input="description"></trix-editor>
               </div>

               <div class="form-group">
                   <label for="category">Category</label>
                   <select name="category_id" id="category_id" class="form-control">
                       <option value="" disabled selected>---select category---</option>
                       @foreach($categories as $category)
                       <option value="{{$category->id}}">{{$category->name}}</option>
                           @endforeach
                   </select>
               </div>

               <div class="form-group">
                   <label for="tags">Tags</label>
                   <select name="tags[]" class="form-control tags" multiple>
                       @foreach($tags as $tag)
                           <option value="{{$tag->id}}">{{$tag->name}}</option>
                           @endforeach
                   </select>
               </div>

               <div class="form-group">
                   <label for="featured_img">Featured Image</label>
                   <input type="file" name="featured_img" id="featured_img" class="form-control-file">
               </div>

               <button type="submit" class="btn btn-primary">Create Post</button>
           </form>
       </div>
   </div>
    @endsection

@section('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.css">
    @endsection

@section('script')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.js"></script>
    <script>
        $(document).ready(function() {
            $('.tags').select2();
        });
    </script>
    @endsection
