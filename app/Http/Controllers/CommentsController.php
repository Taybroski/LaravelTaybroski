<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Auth;

class CommentsController extends Controller
{

    public function __construct()
    {
        // $this->middleware('auth');
    }

    public function store(Request $request)
    {
        $this->validate(request(), [
            'body' => 'required',
            'author' => 'required'
        ]);

        $comment = new Comment;
        $comment->body = $request->input('body');
        $comment->author = $request->input('author');
        $comment->post_id = $request->input('post_id');
        $comment->save();

        return redirect("/posts/".$comment->post_id)->with('success', 'Comment Posted!');
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
