<?php
namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function CreatePost(Request $request)
    {
        $post = new Post();
        $post->body = $request['new_post'];
        $request->user()->posts()->save($post);
        return redirect()->route('dashboard');
    }
}