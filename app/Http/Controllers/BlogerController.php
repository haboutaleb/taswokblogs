<?php

namespace App\Http\Controllers;

use App\Comment;
use App\User;
use App\Post;
use App\Category;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;

class BlogerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
              
        $categories = Category::orderBy('name', 'ASC')->pluck('name', 'id');
        return view('website.bloger', compact('categories'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $this->validate($request, [
            "thumbnail" => 'required',
            "title" => 'required|unique:posts',
            "details" => "required",
            "category_id" => "required"
        ],
            [
                'thumbnail.required' => 'Enter thumbnail url',
                'title.required' => 'Enter title',
                'title.unique' => 'Title already exist',
                'details.required' => 'Enter details',
                'category_id.required' => 'Select categories',
            ]
        );

        $post = new  Post();
        $post->user_id = Auth::id();
        $post->thumbnail = $request->thumbnail;
        $post->title = $request->title;
        $post->country = $request->country;

        $post->slug = str_slug($request->title);
        $post->sub_title = $request->sub_title;
        $post->details = $request->details;
        $post->is_published = '0';
        $post->post_type = 'post';
    
        $post->save();

        $post->categories()->sync($request->category_id, false);

        Session::flash('message', 'Post created successfully');
        return redirect()->route('posts.index');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        //
    }
}
