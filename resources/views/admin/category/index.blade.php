@extends('layouts.app')
@section('content')
    <div class="d-flex justify-content-end mb-2">
        <a href="{{route('category.create')}}" class="btn btn-success">Add Category</a>
    </div>
    <div class="card">
        <div class="card-header">
            Category
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                <th>Category name</th>
                <th>Action</th>
                </thead>
                <tbody>
                @forelse($categories as $category)
                <tr>
                    <td>{{$category->name}}</td>
                    <td>
                        <a href="{{ route('category.edit',$category->id) }}" class="btn btn-info btn-sm">Edit</a>
                    </td>
                    <td>
                        <form action="{{ route('category.destroy',$category->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">delete</button>
                        </form>
                    </td>
                </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center">No category yet.</td>
                        </tr>
                    @endforelse
                </tbody>

            </table>
        </div>
    </div>
    @endsection
