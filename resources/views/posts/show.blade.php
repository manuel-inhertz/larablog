@extends('layouts.app')

@section('content')
<div class="container">
   <div class="post-header" style="background-image: url({{$post->getFeaturedImageUrl()}})">
       <div class="heading">
            <h1 class="text-uppercase">{{$post->title}}</h1>
            <p>Post by {{$post->user->name}}</p>
       </div>
   </div>
   <div class="post-content py-4">
        {!! $post->content !!}
   </div>
</div>
@endsection