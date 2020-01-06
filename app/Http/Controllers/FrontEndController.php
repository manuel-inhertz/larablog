<?php

namespace App\Http\Controllers;

use App\Post;
use App\Page;
use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    
    public function index()
    {
        // get all the posts with pagination
        $posts = Post::latest()->paginate(12);

        // get all the pages
        $pages = Page::get();

        // Return frontend view
        return view('frontend', compact('posts', 'pages'));
    }

    public function show($alias)
    {
        $post = Post::where('alias', $alias)->firstOrFail();

        return view('posts.show', compact('post'));
    }

}
