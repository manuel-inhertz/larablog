@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        @include('layouts/sidebar')
        <div class="col-md-9">
            <div class="card">
                <div class="card-header bg-dark text-white">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <p>Users count: {{$usersCount}}</p>
                    <p>Posts count: {{$postsCount}}</p>

                    <div class="posts-block py-2">
                        <div class="user-filter">
                            <form action="" method="get" class="form-inline">
                                <div class="form-group mb-2">
                                    <label class="col-form-label mr-2" for="user">Filter posts by user:</label>
                                    <select class="form-control mr-2" name="user" id="user" value={{old('user')}}>
                                        @foreach ($users as $user)
                                            <option value="{{$user->id}}">{{$user->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary mb-2">Filter</button>
                            </form>
                        </div>
                        <div class="posts-listing mt-3">
                            {{-- REACT <div id="posts-container"></div> --}}
                            <div class="row">
                                @foreach ($posts as $post)
                                <div class="col-md-12">
                                    <div class="card mb-3">
                                        <div class="row no-gutters">
                                            <div class="col-md-4">
                                                <img src="{{$post->getFeaturedImageUrl()}}" class="card-img h-100" alt="Image about {{$post->title}}">
                                            </div>
                                            <div class="col-md-8">
                                                <div class="card-body">
                                                    <h5 class="card-title">{{$post->title}}</h5>
                                                    <p class="card-text"><small class="text-muted">Post by {{$post->user->name}}</small></p>
                                                    <p class="card-text">{{$post->getShortContent()}}</p>
                                                    <a href="/post/{{$post->alias}}" class="btn btn-sm btn-primary">Read more <i class="fas fa-chevron-right"></i></a>
                                                    @can('update', $post)
                                                        <a href="{{route('post.edit', $post->alias)}}" class="btn btn-sm btn-success">Edit <i class="far fa-edit"></i></a>
                                                    @endcan
                                                    @can('delete', $post)
                                                        <a href="#" class="btn btn-sm btn-danger" data-action="{{route('post.delete', $post->alias)}}">Delete <i class="fas fa-times"></i></a>
                                                    @endcan
                                                </div>
                                            </div>
                                        </div>
                                    </div> 
                                </div>    
                                @endforeach
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
