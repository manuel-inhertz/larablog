@extends('layouts.app')

@section('content')
<div class="container">
   <div class="post-header" style="background-image: url({{$page->getFeaturedImageUrl()}})">
       <div class="heading">
            <h1 class="text-uppercase">{{$page->title}}</h1>
            <p>Published by {{$page->user->name}}</p>
       </div>
   </div>
   <div class="post-content py-4">
        {!! $page->getContent() !!}
   </div>
</div>
@endsection