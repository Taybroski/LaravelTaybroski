@extends('layouts.app')

@section('content')

    <div class="my-container">
        <div class="top">
            <div class="tay">
                <h1>tay<span>.</span></h1>
            </div>
            <p class="slogan text-muted">Buy, Sell, Strum, Code.</p>            
        </div>
        
        <div class="bottom">
            <div class="bottom-left">

            </div>
            <div class="bottom-right">
                <div class="card-container">
                    <div class="my-card">
                        <a href="#" class="link">
                            <div class="card-portfolio">
                                <div class="card-image"></div>
                                <h2>Portfolio</h2>
                            </div>
                        </a>
                    </div>
                    <div class="my-card">
                        <a href="#" class="link">
                            <div class="card-blog">
                                <h2>Blog</h2>
                            </div>
                        </a>
                    </div>
                    <div class="my-card">
                        <a href="#" class="link">
                            <div class="card-contact">
                                <h2>Contact</h2>
                            </div>
                        </a>
                    </div>
                    <div class="my-card">
                        <a href="#" class="link">
                            <div class="card-recomendations">
                                <h2>Recomendations</h2>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection