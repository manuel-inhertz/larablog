@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
       @include('layouts/sidebar')
        <div class="col-md-9">
            <div class="card">
                <div class="card-header bg-dark text-white  d-flex justify-content-between align-items-baseline">
                    <span>Posts</span>
                    <a href="{{route('post.create')}}" class="btn btn-sm btn-primary">Add Post</a>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    {{-- REACT <div id="posts-container"></div> --}}
                    
                    <div class="row">
                        
                        @foreach ($posts as $post)
                        <div class="col-md-6">
                            <div class="card">
                                <img src="{{$post->getFeaturedImageUrl()}}" class="card-img-top" alt="Image about {{$post->title}}">
                                <div class="card-body">
                                    <h5 class="card-title">{{$post->title}}</h5>
                                    <p class="card-text"><small class="text-muted">Post by {{$post->user->name}}</small></p>
                                    <p class="card-text">{{$post->getShortContent()}}</p>
                                    <a href="{{route('post.show', $post->alias)}}" class="btn btn-sm btn-primary">Read more <i class="fas fa-chevron-right"></i></a>
                                    @can('update', $post)
                                        <a href="{{route('post.edit', $post->alias)}}" class="btn btn-sm btn-success">Edit <i class="far fa-edit"></i></a>
                                    @endcan
                                    @can('delete', $post)
                                        <a href="#" class="btn btn-sm btn-danger" data-action="{{route('post.delete', $post->alias)}}">Delete <i class="fas fa-times"></i></a>
                                    @endcan
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
@endsection