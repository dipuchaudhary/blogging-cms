@extends('layouts.app')

@section('content')

    <div class="card">
        <div class="card-header">Dashboard</div>

        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <div class="row">
                <div class="col-md-3">
                    <div class="card bg-success text-white text-center">
                        <div class="card-header">
                            Posts
                        </div>
                        <div class="card-body">{{$posts->count()}}</div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card bg-info text-white text-center">
                        <div class="card-header">
                            Category
                        </div>
                        <div class="card-body">{{$category->count()}}</div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card bg-primary text-white text-center">
                        <div class="card-header">
                            Users
                        </div>
                        <div class="card-body">{{$users->count()}}</div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card bg-danger text-white text-center">
                        <div class="card-header">
                            Trashed posts
                        </div>
                        <div class="card-body">{{$trashed->count()}}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
