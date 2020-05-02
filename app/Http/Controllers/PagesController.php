<?php

namespace App\Http\Controllers;

use App\Page;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Intervention\Image\Facades\Image;

class PagesController extends Controller
{
    use AuthorizesRequests;

    public function __construct()
    {
        // Require the user to be logged in exept in the frontend
        $this->middleware('auth', ['except' => ['show']]);
    }

    private function getPageByAlias($alias) {
		return  Page::where('alias', $alias)->firstOrFail();
	}

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = Page::get();
        return view('pages.index', compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.create');
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
        auth()->user()->pages()->create([
            'title' => $data['title'],
            'alias' => $data['alias'],
            'content' => $data['content'],
            'image' => $imagePath
        ]);

        return redirect(route('page.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function show($alias)
    {
        //get the page by alias
        $page = $this->getPageByAlias($alias);

        // send data and render view
        return view('pages.show', compact('page'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function edit($alias)
    {
        //get the post by alias
       $page = $this->getPageByAlias($alias);

       // send data and render view
       return view('pages.edit', compact('page', 'alias'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function update($alias)
    {
        //get the post by alias
        $page = $this->getPageByAlias($alias);

        //authorize user to only edit own posts
        $this->authorize('update', $page);

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
        
        $page->update(array_merge($data, $imgArray ?? []));

        return redirect('/page');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function destroy(Page $page)
    {
        //
    }
}
