@extends('layouts.app')
@section('content')
    <div class="d-flex justify-content-end mb-2">
        <a href="{{route('tags.create')}}" class="btn btn-success">Add Tag</a>
    </div>
    <div class="card">
        <div class="card-header">
            Tag
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                <th>Tag name</th>
                <th>Action</th>
                </thead>
                <tbody>
                @forelse($tags as $tag)
                    <tr>
                        <td>{{$tag->name}}</td>
                        <td>
                            <a href="{{ route('tags.edit',$tag->id) }}" class="btn btn-info btn-sm">Edit</a>
                        </td>
                        <td>
                            <form action="{{ route('tags.destroy',$tag->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center">No tag yet.</td>
                    </tr>
                @endforelse
                </tbody>

            </table>
        </div>
    </div>
@endsection
