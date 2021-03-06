<?php

namespace App\Http\Controllers;

use App\CategoryPosts;
use App\Like;
use App\Post;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request,Post $post)
    {
        $new = Post::latest()->get();
        $new2 = Post::latest()->get();

        $likes = Like::latest()->get();

        $category = CategoryPosts::all();

        $posts = auth()->user()->Post;

        $post= [];

        foreach($category as $category) {
            $post[ Str::slug( $category->name ) ][] = Post::where('post_id', $category->id )->take(3)->get();
        }

         return view('home', compact('new','new2' ,'likes','posts'));
    }
}
