<?php

use App\Post;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('api')->get('/posts', function (Request $request) {
    if (isset($request['user'])) {
        $posts = Post::where('user_id', '=', $request['user'])->latest()->limit(6)->get();
    } else {
        $posts = Post::latest()->limit(6)->get();
    }
    return response()->json($posts);
});