<?php

namespace App\Http\Controllers;

use App\Mail\VisitorContact;
use App\Post;
use App\Comment;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Laravel\Ui\Presets\React;

class WebsiteController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('name', 'ASC')->where('is_published', '1')->get();
        $posts = Post::orderBy('id', 'DESC')->where('post_type', 'post')->where('is_published', '1')->paginate(5);
        return view('website.index', compact('posts', 'categories'));
    }

    public function post($slug ,Request $request)
    {
        $post = Post::where('slug', $slug)->where('post_type', 'post')->where('is_published', '1')->first();
        if ($post) {
            return view('website.post', compact('post'));
        } else {
            return view('website.post');
        }
    }

    public function category($slug)
    {
        $category = Category::where('slug', $slug)->where('is_published', '1')->first();
        if ($category) {
            $posts = $category->posts()->orderBy('posts.id', 'DESC')->where('is_published', '1')->paginate(5);
            return view('website.category', compact('category', 'posts'));
        } else {
            return view('website.category');
        }
    }

    public function page($slug)
    {
        $page = Post::where('slug', $slug)->where('post_type', 'page')->where('is_published', '1')->first();
        if ($page) {
            return view('website.page', compact('page'));
        } else {
            return view('website.page');

        }
    }

    public function showContactForm()
    {
        return view('contact');
    }

    public function submitContactForm(Request $request)
    {
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'tel' => $request->tel,
            'message' => $request->message,
            
        ];

        Mail::to('hanyaboutaleeb@gmail.com')->send(new VisitorContact($data));
        Session::flash('message', 'Thank you for your email');
        return redirect()->route('contact.show');
    }

    public function createcomment()
    {
        //
        $comments = Comment::orderBy('id', 'ASC');
        return view('website.post', compact('comments'));
    }
    public function storecomment(Post $post,Request $request)
    {
        //
       
        $this->validate($request, [
            "comment" => 'required',
        ]
        );
        $comment = new  Comment();
        $comment->user_id = Auth::id();
        $comment->comment = $request->comment;
        $comment->post_id = $post->id;
        // dd($comment);
        $comment->save();
        Session::flash('message', 'comment created successfully');
        return redirect()->route('post',['slug'=>$post->slug]);
    }
}


