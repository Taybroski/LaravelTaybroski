@extends('layouts.app')
@section('body_class', 'post-create-page')

@section('content')
    
  <h1 class="page-title">Create a Post Page</h1>

  <div class="form-container">
    <form class="my-form" action="/posts" method="POST">
      {{ csrf_field() }}
      <label for="title">Title</label>
      <input type="text" name="title">
  
      <label for="body"></label>
      <textarea id="editor" name="body" cols="30" rows="10"></textarea>

      <label for="tags">Add Tags</label>
      <input type="text" name="tags" placeholder="Seperate with a comma ,">    
      <button type="submit">Submit Post</button>
    </form>
  </div>


@endsection