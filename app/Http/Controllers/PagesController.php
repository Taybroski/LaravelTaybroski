<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;
use App\Tag;

class PagesController extends Controller
{
    public function index()
    {
        return view('pages.index');
    }

    public function about()
    {
        return view('pages.about');
    }

    public function portfolio()
    {
        return view('pages.portfolio');
    }

    public function dashboard()
    {
        $posts = Post::all();
        $tags = Tag::all();

        return view('pages.dashboard', compact(['posts', 'tags']));
    }
}
