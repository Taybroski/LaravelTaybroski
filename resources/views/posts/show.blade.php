@extends('layouts.app')
@section('body_class', 'posts-single-page')

@section('content')
    
  <h1>Single Post Page</h1>
  <br>

  <div class="post">
    <h1>{{ $post->title }}</h1>
    <p>{{ $post->body }}</p>
  
    @foreach ($post->comments as $c)
  
      <div class="comment">
        <p>{{ $c->body }}</p>
        <p class="text-muted">{{ $c->author }}</p>
      </div>
        
    @endforeach
  </div>
  <br>

  <form class="my-form" action="/comments" method="POST">
    {{ csrf_field() }}
    <label for="body"></label>
    <textarea name="body" cols="30" rows="10" required></textarea>
    <input type="text" name="author" placeholder="Your name here">
    <input type="hidden" name="post_id" value="{{ $post->id }}">
    <button type="submit">Post Comment</button>
  </form>

@endsection