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
            <div class="card-container">
                <div class="mycard">
                    <a href="#" class="link">
                        <div class="card-portfolio">
                            Portfolio
                        </div>
                    </a>
                </div>
                <div class="mycard">
                    <a href="#" class="link">
                        <div class="card-blog">
                            Blog
                        </div>
                    </a>
                </div>
                <div class="mycard">
                    <a href="#" class="link">
                        <div class="card-contact">
                            Contact
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    
@endsection