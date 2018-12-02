@extends('layouts.app')
@section('body_class', 'posts-index-page')

@section('content')

<div class="posts-index">

  <div class="page-title">
    <h1>Blog</h1>
  </div>
  
  <div class="post-container">

    @foreach ($posts as $p)
      <div class="post">
        <div class="post-title">
          <a href="/posts/{{ $p->slug }}">
            <h1>{{ $p->title }}</h1>
            <div class="post-carets">
              <i class="fas fa-caret-right"></i>
              <i class="fas fa-caret-right"></i>
            </div>
          </a>
        </div>                
        
        <div class="post-body">
          <p>{!! str_limit($p->body, 200) !!}<a class="my-text-muted" href="/posts/{{ $p->slug }}">Read On...</a></p>
        </div>    
        
        <div class="post-labels">
          <div class="post-categories">
            <div class="cat">Category</div>
            <div class="cat">Category</div>
          </div>
          <div class="post-tags">
            <div class="tag">Tag</div>
            <div class="tag">Tag</div>
            <div class="tag">Tag</div>
          </div>
          <div class="post-created-at">
            <p class="my-text-muted">{{ \Carbon\Carbon::parse($p->created_at)->format('LS F Y') }}</p>
          </div>
        </div>
      </div>      
    @endforeach

  </div>
</div>

@endsection