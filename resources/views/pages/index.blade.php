@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
       @include('layouts/sidebar')
        <div class="col-md-9">
            <div class="card">
                <div class="card-header bg-dark text-white  d-flex justify-content-between align-items-baseline">
                    <span>Pages</span>
                    <a href="{{route('page.create')}}" class="btn btn-sm btn-primary">Add page</a>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="row">
                        
                        @foreach ($pages as $page)
                        <div class="col-md-12">
                            <div class="card">
                                <div class="row align-items-center">
                                    <div class="col-md-4">
                                        <img src="{{$page->getFeaturedImageUrl()}}" class="img-fluid" alt="Image about {{$page->title}}">
                                    </div>
                                    <div class="col-md-8 card-body">
                                        <h5 class="card-title">{{$page->title}}</h5>
                                        <p class="card-text"><small class="text-muted">page by {{$page->user->name}}</small></p>
                                        <p class="card-text">{{$page->getShortContent()}}</p>
                                        <a href="{{route('page.show', $page->alias)}}" class="btn btn-sm btn-primary">Read more <i class="fas fa-chevron-right"></i></a>
                                        @can('update', $page)
                                            <a href="{{route('page.edit', $page->alias)}}" class="btn btn-sm btn-success">Edit <i class="far fa-edit"></i></a>
                                        @endcan
                                        @can('delete', $page)
                                            <a href="#" class="btn btn-sm btn-danger" data-action="{{route('page.delete', $page->alias)}}">Delete <i class="fas fa-times"></i></a>
                                        @endcan
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
@endsection