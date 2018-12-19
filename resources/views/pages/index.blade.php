@extends('layouts.app')
@section('body_class', 'index-page')

@section('content')

    <div class="my-container">
        <div class="first">
            <div class="title">
                <p>hi, i'm</p>
                <h1>tay</h1>
                <span>.</span>
            </div>
        </div>

        <div class="zero second">
            <div class="svg-circle-container">
                <div class="svg-circle"></div>
                <div class="svg-icon"></div>        
            </div>
            <h1 class="svg-text">E-Commerce</h1>
        </div>

        <div class="zero third">
            <div class="svg-circle-container">
                <div class="svg-circle"></div>
                <div class="svg-icon"></div>        
            </div>
            <h1 class="svg-text">Web Development</h1>
        </div>

        <div class="zero fourth"></div>

        <div class="zero fith">
            <div class="email">
                <div class="svg-icon"></div>
                <a href="mailto:hello@taybroski.com">hello@taybroski.com</a>
            </div>
            <a href="{{ url('/posts') }}"><h1>Blog ></h1></a>
            {{-- <h1>Stoic Quote</h1> --}}
        </div>

        {{-- <div class="zero sixth">
            <div class="stuff">
                <p>Hey, wanna see some</p>
                <h1>Stuff</h1>
            </div>

            <div class="blog">
                <p>Oh look, a</p>
                <h1>Blog</h1>
            </div>
        </div> --}}
    
  </div>
    
@endsection