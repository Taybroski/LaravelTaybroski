@extends('layouts.app')
@section('body_class', 'posts-index-page')

@section('content')

<div class="posts-index">

  <div class="page-title">
    <h1>Blog</h1>
  </div>
  
  <div class="post-container">

    @if (count($posts) == 0)
        <h1>No Posts... Yet</h1>
    @endif
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

        <!-- Go to www.addthis.com/dashboard to customize your tools --> 
        <div class="my-addthis addthis_toolbox addthis_inline_share_toolbox" 
             addthis:url="{{ URL::current() }}" 
             addthis:title="{!! $p->title !!}" 
             addthis:description="{!! $p->body !!}"></div>
        
        <div class="post-labels">
          {{-- <div class="post-categories">
            <div class="cat">Category</div>
            <div class="cat">Category</div>
          </div> --}}
          <div class="post-tags">
            @foreach ($p->tags as $tag)
                <div class="tag">{{ $tag->name }}</div>
            @endforeach
          </div>
          <div class="post-created-at">
            <p class="my-text-muted">{{ \Carbon\Carbon::parse($p->created_at)->format('dS F Y') }}</p>
          </div>
        </div>
      </div>      
    @endforeach
    <a class="btn-back" href="{{ url('/') }}"><i class="fas fa-caret-left"></i> Back</a>
  </div>
</div>

@endsection