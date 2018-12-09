@extends('layouts.app')

@section('body_class', 'posts-edit-page')

@section('content')

  <div class="page-title">
    <h1>Edit Post</h1>
  </div>

  <div class="form-container">
    <form class="my-form" action="/posts" method="POST">
      {{ csrf_field('PUT') }}
      {{ csrf_field() }}
      <label for="title">Title</label>
      <input type="text" name="title" value="{{ Request::old('title', $post->title) }}">
  
      <label for="body"></label>
      <textarea id="editor" name="body" cols="30" rows="10">{{ Request::old('body', $post->body) }}</textarea>
  
      <button type="submit">Submit Post</button>
    </form>
  </div>

@endsection