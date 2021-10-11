<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;

class HomeController extends Controller
{
    //

    public function index()
    {
       // $posts = Post::withCount('comments')->get();
       /* $replyComment = Comment::where('parent_id', '!=', 0)
       ->where('post_id', $post->id)
       ->withCount('replies')
       ->get();
       
       $result = $post->comments->count() + $replyComment->count(); */
       
        return view('home', [
            "title" => "Posts with comments:",
            'active' => 'home',
            "posts" => Post::whereHas('comments')->paginate(7)
        ]);
    }
}
