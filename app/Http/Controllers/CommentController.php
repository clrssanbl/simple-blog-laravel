<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;

class CommentController extends Controller
{
    //
    public function store(Request $request)
    {
        //ddd($request);
        $comment = new Comment;
        $comment->body = $request->get('body');
        $comment->post_id = $request->get('post_id');
        $comment->user_id = auth()->user()->id;
        //$comment->author()->associate($request->user());
        $post = Post::find($request->get('post_id'));
        $post->comments()->save($comment);
        //ddd($comment);
        return back();
    }

    public function replyStore(Request $request)
    {
        $reply = new Comment;
        $reply->body = $request->get('body');
        $reply->post_id = $request->get('post_id');
        $reply->user_id = auth()->user()->id;
        $reply->parent_id = $request->get('comment_id');
        $post = Post::find($request->get('post_id'));

        $post->comments()->save($reply);

        return back();
    }

    public function destroy(Comment $comment)
    {
        //
        Comment::destroy($comment->id);

        return back();
    }
}
