<?php
namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function getDashboard()
    {
        $posts = Post::orderBy('created_at', 'desc')->get();
        return view('dashboard', ['posts' => $posts]);
    }
    public function CreatePost(Request $request)
    {
        $this->validate($request, [
            'new_post' => 'required|max:1000'
        ]);
        $post = new Post();
        $post->body = $request['new_post'];
        $message = "Something went wrong";
        if($request->user()->posts()->save($post)) {
            $message = "Successfully posted!";
        } 
        return redirect()->route('dashboard')->with(['message' => $message]);
    }
    public function DeletePost($post_id)
    {
        $post = Post::where('id', $post_id)->first();
        if(Auth::user() != $post->user){
            return redirect()->back();
        }
        $post->delete();
        return redirect()->route('dashboard')->with(['message' => 'Successfully Deleted']);
    }
}