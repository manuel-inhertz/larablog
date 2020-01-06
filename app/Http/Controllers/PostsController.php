<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Intervention\Image\Facades\Image;

class PostsController extends Controller
{
    use AuthorizesRequests;

    public function __construct()
    {
        // Require the user to be logged in
        $this->middleware('auth', ['except' => ['show']]);
    }

    private function getPostByAlias($alias) {
		return  Post::where('alias', $alias)->firstOrFail();
	}
   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();

        $posts= Post::where('user_id', '=' , $user->id)->latest()->get();

        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate data passed through the form
        $data = request()->validate([
            'title' => 'required',
            'alias' => 'required',
            'content' => 'required',
            'image' => ['required', 'image'],
        ]);

        // Resize the image from the post request
        $imagePath = request('image')->store('uploads', 'public');
        $image = Image::make(public_path("storage/{$imagePath}"))->fit(800, 450);
        $image->save();

        // Pushing data to the DB
        auth()->user()->posts()->create([
            'title' => $data['title'],
            'alias' => $data['alias'],
            'content' => $data['content'],
            'image' => $imagePath
        ]);

        return redirect('/posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($alias)
    {
        //get the post by alias
        $post = $this->getPostByAlias($alias);

        // send data and render view
        return view('posts.show', compact('post'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($alias)
    {
       
        //get the post by alias
       $post = $this->getPostByAlias($alias);

       // send data and render view
       return view('posts.edit', compact('post', 'alias'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update($alias)
    {
        //get the post by alias
        $post = $this->getPostByAlias($alias);

        //authorize user to only edit own posts
        $this->authorize('update', $post);

        // Validate data passed through the form
        $data = request()->validate([
            'title' => 'required',
            'alias' => 'required',
            'content' => 'required',
            'image' => '',
        ]);

        if(request('image')) {
    		// Resize the image from the post request
            $imagePath = request('image')->store('uploads', 'public');
            $image = Image::make(public_path("storage/{$imagePath}"))->fit(800, 450);
			$image->save();
			
			// Setting the image array
			$imgArray = ['image' => $imagePath];
        }
        
        $post->update(array_merge($data, $imgArray ?? []));

        return redirect('/posts');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($alias)
    {
       //get the post by alias
       $post = $this->getPostByAlias($alias);

       //authorize user to only delete own post
       $this->authorize('delete', $post);

       //handle post delete
       if ($post->delete()){
            return ['success' => true, 'message' => 'Post with ID of '. $post->id .' deleted!!'];
       } else {
            return ['success' => false, 'message' => 'Something went wrong handling the request!'];
       }

    }
}
