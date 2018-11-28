@extends('layouts.app')
@section('body_class', 'posts-all-page')

@section('content')
    
  <br>
  <h1>Posts Index Page</h1>
  <br>

  @foreach ($posts as $p)

    <div class="post">
      <br>
      <h2><a href="/posts/{{ $p->id }}">{{ $p->title }}</a></h2>    
      <p>{!! $p->body !!}</p>
      <p class="text-muted">Author: {{ $p->user->name }}</p>
      <p class="text-muted">Posted: {{ \Carbon\Carbon::parse($p->created_at)->format('dS F Y h:ia') }}</p>
      {{-- <p class="text-muted">Posted: {{ \FormatHelper::formatPostDate($p->created_at) }}</p> --}}
      <hr>    

    @foreach ($p->comments as $c)
      <div class="comment">
        <p>{{ $c->body }}</p>
        <p class="text-muted">Author: {{ $c->author }}</p>        
      </div>      
    @endforeach    
    <br><br>
    </div>
  @endforeach

@endsection