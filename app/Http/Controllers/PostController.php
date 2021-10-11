<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Models\Comment;

class PostController extends Controller
{
    //
    public function index()
    {
        $title ='';
        if(request('category')) {
            $category = Category::firstWhere('slug', request('category'));
            $title = ' in ' . $category->name;
        }

        if(request('author')) {
            $author = User::firstWhere('username', request('author'));
            $title = ' by ' . $author->name;
        }

        $posts = Post::latest()->filter(request(['search', 'category','author']))->paginate(7)->withQueryString();


        return view('posts', [
            "title" => "All Posts" . $title,
            "active" => 'posts',
            "posts" => $posts,
        ]);
    }

    public function show(Post $post)
    {
  
       $replyComment = Comment::where('parent_id', '!=', 0)
       ->where('post_id', $post->id)
       ->withCount('replies')
       ->get();
       
       $result = $post->comments->count() + $replyComment->count();
        return view('post', [
            "title" => "Single Post",
            "active" => 'posts',
            "post" => $post,
            "result" => $result
        ]);
    }
}
