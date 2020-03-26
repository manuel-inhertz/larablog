<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Home | {{ config('app.name', 'Laravel') }}</title>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body>
        <div class="position-ref full-height">
            <nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm">
                <div class="container">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>
    
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
    
                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ml-auto">
                            @foreach($pages as $page)
                                <li class="nav-item">
                                    <a href="{{ route('page.show', $page->alias) }}" class="nav-link">{{ $page->title }}</a>
                                </li>
                            @endforeach
                            <!-- Authentication Links -->
                            @guest
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                    </li>
                                @endif
                            @else
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }} <span class="caret"></span>
                                    </a>
    
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>
    
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </nav>

            <div class="content p-4">
               <div class="container">
                    <!-- App Header -->
                    <div class="jumbotron text-center">
                        <h1 class="display-4">{{ config('app.name', 'Laravel') }}</h1>
                        <p class="lead">This is a blogging platform built on semplicity</p>
                        <hr class="my-4">
                        <p>Manage users and content through the Dashboard</p>
                        <a class="btn btn-primary btn-lg" href="{{route('admin')}}" role="button">Go to Dashboard</a>
                    </div>
                  
                    <div class="heading mb-4">
                        <h2>Recent posts from the platform:</h2>
                    </div>
                    <div class="posts-listing">
                        <div class="row">
                        
                            @foreach ($posts as $post)
                            <div class="col-md-4">
                                <div class="card">
                                    <img src="{{$post->getFeaturedImageUrl()}}" class="card-img-top" alt="Image about {{$post->title}}">
                                    <div class="card-body">
                                        <h5 class="card-title">{{$post->title}}</h5>
                                        <p class="card-text"><small class="text-muted">Post by {{$post->user->name}}</small></p>
                                        <p class="card-text">{{$post->getShortContent()}}</p>
                                        <a href="/post/{{$post->alias}}" class="btn btn-sm btn-primary">Read more <i class="fas fa-chevron-right"></i></a>
                                    </div>
                                </div> 
                            </div>    
                            @endforeach
                           
                        </div>

                        {{ $posts->links() }}
                    </div>
               </div>
            </div>
        </div>
    </body>
</html>
