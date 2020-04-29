@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-end mb-2">
        <a href="{{route('users.create')}}" class="btn btn-success">Create User</a>
    </div>
    <div class="card">
        <div class="card-header">
            Users
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                <th>image</th>
                <th>name</th>
                <th>permission</th>
                <th>Action</th>
                </thead>
                <tbody>
                @forelse($users as $user)
                    <tr>
                        <td><img src="{{ asset('storage/'.$user->profile->avatar) }}" alt="" width="60px" height="60px" style="border-radius: 50%"></td>
                        <td>{{$user->name}}</td>
                        <td>
                            @if($user->role=='admin')
                                <a href="{{route('users.not.admin',$user->id)}}" class="btn btn-danger btn-sm">Remove Permission</a>
                                @else
                                <a href="{{route('users.admin',$user->id)}}" class="btn btn-success btn-sm">Make Admin</a>
                                @endif
                        </td>
                        <td>
                            @if(Auth::id()!=$user->id)
                                <form action="{{ route('users.destroy',$user->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm">Delete</button>
                                </form>
                                @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center">No post found.</td>
                    </tr>
                @endforelse
                </tbody>

            </table>
        </div>
    </div>
@endsection
