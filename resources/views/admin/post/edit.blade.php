@extends('layouts.app')
@section('content')

    <div class="card">
        <div class="card-header">
            Edit post:{{$post->title}}
        </div>
        <div class="card-body">
            @include('admin.partials.errors')
            <form action="{{route('posts.update',$post->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" id="title" class="form-control" value="{{$post->title}}">
                </div>


                <div class="form-group">
                    <label for="content">Content</label>
                    <input id="description" type="hidden" name="content" value="{!! $post->content !!}">
                    <trix-editor input="description"></trix-editor>
                </div>

                <div class="form-group">
                    <label for="category">Category</label>
                    <select name="category_id" id="category_id" class="form-control">
                        <option value="" disabled>---select category---</option>
                        @foreach($categories as $key => $value)
                            <option value="{{$key}}"
                            @if($post->category->id == $key)
                                selected
                                @endif
                            >{{$value}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="tags">Tags</label>
                    <select name="tags[]" class="form-control tags" multiple>
                        @foreach($tags as $tag)
                            <option value="{{$tag->id}}"
                            @foreach($post->tags as $t)
                                @if($tag->id == $t->id)
                                    selected
                                    @endif
                                @endforeach
                            >{{$tag->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="featured_img">Featured Image</label>
                    <input type="file" name="featured_img" id="featured_img" class="form-control-file">
                </div>
                <div class="form-group">
                    <label for="">current image</label>
                    <img src="{{ asset('storage/'.$post->featured_img) }}" alt="" width="100px" height="60px" alt="">
                </div>


                <button type="submit" class="btn btn-primary">Update Post</button>
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
