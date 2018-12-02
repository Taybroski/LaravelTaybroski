@extends('layouts.app')
@section('body_class', 'posts-show-page')

@section('content')
    
  <div class="post-container">
    <div class="post">
        <div id="element"></div>
      <div class="post-title-tag-cat">
        <div class="post-title">
          <h2>{{ $post->title }}</h2>
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
        </div>
      </div>
        <div class="post-social-stats">
          <div class="post-views">
            24
            <i class="fas fa-eye"></i>
          </div>
          <div class="post-comments">
            {{ count($post->comments) }}
            <i class="fas fa-comment"></i>
          </div>
          <div class="post-shares">
            0
            <i class="fas fa-share-alt-square"></i>
          </div>
        <div class="post-created-at">
          <p class="my-text-muted">{{ \Carbon\Carbon::parse($post->created_at)->format('LS F Y') }}</p>
        </div>
      </div>
      <div class="post-body">
        <p>{!! $post->body !!}</p>
      </div>
      <div class="post-sentence">
        <p class="my-text-muted">Liked this? Leave a comment or share the post!</p>
      </div>
      <div class="post-social-links">
        <div class="post-facebook">
          <a href="#">
            <i class="fab fa-facebook-square"></i>
          </a>
        </div>
        <div class="post-twitter">
          <a href="#">
            <i class="fab fa-twitter-square"></i>
          </a>
        </div>
      </div>     

      <div class="post-comment-section">
        <form class="form-comment my-form" action="/comments" method="POST">
          {{ csrf_field() }}
          <label for="body"></label>
          <textarea id="submitEnter" name="body" cols="30" rows="10" placeholder="Reply..." required></textarea>
          <input type="text" name="author" placeholder="Your name here (Optionial, but brave)">
          <input type="hidden" name="post_id" value="{{ $post->id }}">
          <button class="btn-comment-submit" type="submit">Post Comment</button>
        </form>
        
        <div class="comment-container">
          <h2>Comments</h2>
          @foreach ($post->comments as $c)
            <div class="comment">
              <div class="comment-content">
                <p>{!! $c->body !!}</p>
                <p class="my-text-muted">
                  {{ $c->author }} - 
                  {{ \Carbon\Carbon::parse($c->created_at)->format('L/n/y') }}
                </p>
              </div>
              <form action="/comments/{{ $c->id }}" method="POST">
                @method('DELETE')
                @csrf
                <button id="deleteConfirm" class="delete-icon" type="submit"><i class="far fa-trash-alt"></i></button>
              </form>
            </div>
          @endforeach 
        </div>
      </div>

      <a class="btn-back" href="{{ url()->previous() }}"><i class="fas fa-caret-left"></i> Back</a>
    </div>
  </div>

@endsection