<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Auth;
use App\Tag;

class PostsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->get();
        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        $tags = Tag::all();
        return view('posts.create', compact('tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(), [
            'title' => 'required',
            'body'  => 'required'
        ]);

        $post = new Post;
        $post->title = $request->input('title');
        $post->body  = $request->input('body');
        $post->user_id = auth()->user()->id;  
        
        if ($post && $request->tags) 
        {
            $tags = explode(',', $request->get('tags'));
            $tag_ids = [];
            foreach ($tags as $tagName) 
            {
                $tag = Tag::firstOrCreate(['name' => $tagName]);
                if($tag)
                {
                    $tag_ids[] = $tag->id;
                }
            }
        }
        $post->save();        
        $post->tags()->sync($tag_ids);

        return redirect('/posts')->with('success', 'Post created successfully!');
    }

    public function show(Post $post)
    {        
        return view('posts.show', compact('post'));
    }

    public function edit(Post $post)
    {        
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, $id)
    {
        $post = Post::find($id);
        // The 'fill' function works because we have specified the fillable attributes within the model.
        $post->fill(request(['title', 'body']));
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect('/admin/dashboard')->with('success', 'Post Removed');
    }
}
