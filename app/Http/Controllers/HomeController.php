<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        // Get all the users
        $users = User::get();
        // Get count of all users
        $usersCount = User::count();

        if (isset($request['user'])) {
            $posts = Post::where('user_id', '=', $request['user'])->latest()->limit(6)->get();
        } else {
            $posts = Post::latest()->limit(6)->get();
        }

        $postsCount = Post::count();

        return view('dashboard', compact('users', 'usersCount', 'posts', 'postsCount' ));
    }
}
