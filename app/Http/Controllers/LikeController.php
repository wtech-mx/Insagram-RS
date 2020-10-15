<?php

namespace App\Http\Controllers;

use App\Like;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class LikeController extends Controller
{
    public function update(Request $request,Like $like,Post $post)
    {
        $data = $request->validate([
            'status' => 'required|',
            'post_id' => 'required',
        ]);


          auth()->user()->Like()->update([
            'status' => $data['status'],
             'post_id' => $data['post_id'],
          ]);

   return Redirect::back();

    }
}
