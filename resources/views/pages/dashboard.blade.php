@extends('layouts.app')
@section('body_class', 'dashboard-page')

@section('content')

<div class="dashboard-container">
    <div class="card">

        <div class="card-header">                
            <i class="fas fa-user-ninja mr-2"></i>Dashboard - 
            {{ \Auth::user()->name }}, You are logged in!
            <div class="ml-4 date-time text-muted"><img id="loader" src="{{ asset('/images/ajax-loader-lightgrey.gif') }}"></div>
        </div>

        {{-- Main card body --}}
        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            {{-- API Feeds --}}
            <div class="card feed-container">
                <div class="card-header">
                    Feeds
                </div>

                {{-- Feed container card body --}}
                <div class="card-body">

                    <div class="dual-api-container">
                        {{-- Weather API --}}
                        <div class="card api-weather">
                            <div class="card-header">
                                Weather
                                {{-- loading icon from http://www.ajaxload.info/ --}}
                                <div class="weather-loader">
                                    <img id="loader" src="{{ asset('/images/ajax-loader-lightgrey.gif') }}">
                                </div>
                            </div>
                            <div id="weather-details" class="card-body">
                                <div class="weather-left">
                                    <p>Location:</p>
                                    <p>Description:</p>
                                    <p>Temp:</p>
                                    <p>Wind:</p>
                                    <p>Pressure:</p>
                                    <p>Humidity:</p>
                                    <p>Sunrise:</p>
                                    <p>Sunset:</p>
                                </div>
                                <div class="weather-right">
                                </div>
                            </div> {{-- End Weather API body --}}
                        </div> {{-- End Weather API card --}}

                        {{-- Google Map --}}
                        <div class="card api-map">
                            <div class="card-header">
                                Current Location
                                {{-- loading icon from http://www.ajaxload.info/ --}}
                                <div class="map-loader">
                                    <img id="loader" src="{{ asset('/images/ajax-loader-lightgrey.gif') }}">
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="map-container mb-2">
                                    <div id="map"></div>
                                </div>
                                <div class="map-lat-lng">
                                    <div class="my-text-muted">
                                        Lat: <span class="map-lat"></span>
                                    </div>
                                    <div class="my-text-muted">
                                        Lng: <span class="map-lng"></span>
                                    </div>
                                </div>
                            </div> {{-- End Google Map body --}}
                        </div> {{-- End Google Map main Card --}}
                    </div> {{-- End dual API container --}}
                
                    {{-- Wakatime Stats --}}
                    <div id="wakatime" class="card">
                        <div class="card-header">
                            Wakatime Stats
                        </div>
                        <div id="waka-stats" class="card-body">
                            <div class="waka-stats">
                                <div class="waka-time-wrapper">
                                    <p class="text-right">Last 7 Days: </p>
                                    <div id="waka-time">
                                        <p></p>
                                        {{-- loading icon from http://www.ajaxload.info/ --}}
                                        <img id="loader" src="{{ asset('/images/ajax-loader-white.gif') }}">
                                    </div>
                                </div>
                                <div class="waka-lang-wrapper">
                                    <p>Languages:</p>
                                    <div class="waka-lang-list">
                                        <ul id="waka-list" class="my-card-list">
                                            {{-- js list injection here --}}
                                            {{-- WHITE loading icon from http://www.ajaxload.info/ --}}
                                            <img id="loader" src="{{ asset('/images/ajax-loader-white.gif') }}">
                                        </ul>
                                    </div>                            
                                </div>
                                <br>
                                <figure><embed src="https://wakatime.com/share/@tazje/fa837a01-c138-4527-91ed-468509e75a57.svg"></embed></figure>
                            </div>
                        </div>
                    </div> {{-- End Wakatime stats --}}
                    
                </div> {{-- End API feed body --}}
            </div> {{-- End API feeds card --}}

            {{-- Blog Post table --}}
            <div class="card">
                <div class="card-header">
                    Your Blog Posts
                </div>                                
                <div class="card-body">
                    <div class="card">
                        <div class="card-header">
                            <a class="text-muted" href="/posts/create">Create a Post</a>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-striped text-center">
                                <thead>
                                    <tr>
                                        <th>
                                            ID
                                        </th>
                                        <th>
                                            Title
                                        </th>
                                        <th>
                                            Body
                                        </th>
                                        <th>
                                            Cmnts
                                        </th>
                                        <th>
                                            Tags
                                        </th>
                                        <th>
                                            Edit
                                        </th>
                                        <th>
                                            Delete
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($posts as $p)
                                        <tr>
                                            <td>
                                                {{ $p->id }}
                                            </td>
                                            <td>
                                                <a href="/posts/{{ $p->slug }}">{!! $p->title !!}</a>
                                            </td>
                                            <td>
                                                {!! str_limit($p->body, 100) !!}
                                            </td>
                                            <td>
                                                {{ count($p->comments) }}
                                            </td>
                                            <td>
                                                {{ count($p->tags) }}
                                            </td>
                                            <td>
                                                <a href="/posts/{{ $p->slug }}/edit"><i class="far fa-edit"></i></a>
                                            </td>
                                            <td>
                                                <form action="/posts/{{ $p->slug }}" method="POST">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button class="delete-icon deleteConfirm" type="submit"><i class="far fa-trash-alt"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table> {{-- End blog post table --}}
                            @if (count($posts) == 0)
                                <h1 class="text-center mb-3">No Posts Found</h1>
                            @endif
                            <hr class="mb-4">
                            {{-- Tags --}}
                            <div class="card">
                                <div class="card-body tags-container">
                                    <div class="add-tag">
                                        <form class="my-form" action="/tags" method="POST">
                                            {{ csrf_field() }}
                                            <label for="name"></label>
                                            <input type="text" name="name">
                                            <button type="submit">Add Tag</button>
                                        </form>
                                    </div>
                                    <div class="tags">
                                        @if (count($tags) > 0)                        
                                            <ul class="my-card-list">
                                                @foreach ($tags as $tag)
                                                    <li>
                                                        {{ $tag->name }}
                                                        <form action="/tags/{{ $tag->id }}" method="POST">
                                                            @method('DELETE')
                                                            @csrf
                                                            <button class="delete-icon deleteConfirm" type="submit"><i class="far fa-trash-alt ml-1"></i></button>
                                                        </form>
                                                    </li>
                                                @endforeach
                                            @else 
                                                <p>No tags found</p>
                                            </ul>
                                        @endif
                                    </div>
                                </div>
                            </div> {{-- End Tags --}} 
                        </div>
                    </div> 
                </div> {{-- End blog post body --}}
            </div> {{-- End blog post card --}}       
        </div> {{-- End main dashboard card body --}}
    </div> {{-- End main sahboard card --}}
</div> {{-- End dashboard container --}}

@endsection
