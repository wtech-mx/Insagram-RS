<?php

namespace App\Http\Controllers;


use App\CategoryPosts;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Intervention\Image\Facades\Image;


class PostController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }

    public function index()
    {
        $user = auth()->user();

        $post = Post::where('user_id', $user->id)->paginate(3);

        return view('post.index',compact('post','user'));

    }

    public function create()
    {

        $post = CategoryPosts::all(['id','name']);
        return view('post.create',compact('post'));
    }

    public function store(Request $request)
    {


        $data = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'img' => 'required|image',
            'post_id' => 'required',
        ]);

    	if ($data['img']) {
    		$file=$request->file('img');
    		$location = $file->move(public_path().'/upload-img',time().".".$file->getClientOriginalExtension());
    		$imgname =  $data['img']=time().".".$file->getClientOriginalExtension();
    	}


        auth()->user()->Post()->create([
            'title' => $data['title'],
            'description' => $data['description'],
            'img' => $imgname,
            'post_id' => $data['post_id'],
        ]);



        return redirect()->action('HomeController@index');

    }

    public function show( Request $request, $post_id)
    {
        $post = Post::findOrFail($post_id);

        return view('posts.show',compact('post'));
    }

    public function edit(Post $post)
    {
        $this->authorize('view',$post);

        $category = CategoryPosts::all(['id','name']);

        return view('post.edit',compact('category','post'));
    }

    public function update(Request $request, Post $post)
    {

        $data = $request->validate([
            'title' => 'required|min:6',
            'description' => 'required',
            'post_id' => 'required',
        ]);


        if (request('img')){
    		$file=$request->file('img');

    		$location = $file->move(public_path().'/upload-img',time().".".$file->getClientOriginalExtension());
    		$imgname =  $data['img']=time().".".$file->getClientOriginalExtension();
    		$post->img = $imgname;
    	}


        $post->title = $data['title'];
        $post->description = $data['description'];
        $post->post_id = $data['post_id'];

        $post->save();

         return redirect()->action('HomeController@index');
    }

    public function destroy(Post $post)
    {
        //ejecutar el policy
        $this->authorize('delete',$post);

        $post->delete();

        return Redirect::back();
    }
}
