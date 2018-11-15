@extends('layouts.app')

@section('content')

    <div class="my-container">
        <div class="top">
            <div class="tay">
                <h1>tay<span>.</span></h1>
            </div>
            <p id="slogan" class="text1 text-muted">Buy, Sell, Strum, Code.</p>
            <p id="slogan" class="text2 text-muted">Zombie Killer Robots Inc.</p>
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