<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\User;
use Illuminate\Support\Facades\Session;
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
    public function index()
    {
        $categories = Category::orderBy('id', 'DESC')->limit('3')->get();
        $posts = Post::orderBy('id', 'DESC')->where('post_type', 'post')->limit('3')->get();
        $pages = Post::orderBy('id', 'DESC')->where('post_type', 'page')->limit('3')->get();
        $users= User::orderBy('id', 'DESC')->limit('7')->get();
        return view('admin.index', compact('categories', 'posts', 'pages','users'));
    }

    public function destroy(User $user)
    {
        $user->delete();

        Session::flash('delete-message', 'Category deleted successfully');
        return redirect()->route('categories.index');
    }
}
