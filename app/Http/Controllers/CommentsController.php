<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Post;
use App\Auth;

class CommentsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['store']]);
    }

    public function store(Request $request)
    {
        $this->validate(request(), [
            'body' => 'required',
            'author' => 'nullable'
        ]);

        $comment = new Comment;
        $comment->body = $request->input('body');
        $comment->author = $request->input('author');
        $comment->post_id = $request->input('post_id');
        $comment->save();

        $post = Post::find($comment->post_id);
        return redirect("/posts/".$post->slug)->with('success', 'Comment Posted!');
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {        
        $comment = Comment::find($id);
        $p = $comment->post_id;
        $post = Post::find($p);
        $comment->delete();

        return redirect('/posts/'.$post->slug)->with('success', 'Comment Removed');
    }
}
