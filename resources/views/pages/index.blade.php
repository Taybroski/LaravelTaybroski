@extends('layouts.app')
@section('body_class', 'index-page mobile-nav-hide')

@section('content')

    <div class="my-container">
        <div class="big-card">
            @include('partials.navbar')
            {{-- <div class="tay">
                <h1>tay<span>.</span></h1>
            </div>
            <p class="slogan text-muted">Buy, Sell, Strum, Code.</p> --}}
            
            <div class="index-header">
                <div class="header-container">
                    <h1>
                        <span>hi</span>, <span>i'm </span> <span>tay</span><span>.</span>
                    </h1>
                </div>
            </div>

            <div class="index-slogan">
                <div class="slogan-container">
                    <span class="top-quote">''</span><p class="top-slogan">Buy, Sell, Strum, Code.</p>
                    <div class="line"></div>
                    <p class="bottom-slogan">Another Day, Another Node.</p><span class="bottom-quote">''</span>
                </div>
                <h2>E-Commercer <span>&amp;&amp;</span> Web Developer</h2>
            </div>
            <div class="another-slogan">
                
            </div>
        </div>
    </div>
    
@endsection