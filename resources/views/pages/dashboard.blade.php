@extends('layouts.app')
@section('body_class', 'dashboard-page')

@section('content')

<div class="dashboard-container">
    <div class="card">

        <div class="card-header">                
            <i class="fas fa-user-ninja mr-2"></i>Dashboard - 
            {{ \Auth::user()->name }}, You are logged in!
        </div>

        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            {{-- API Feeds --}}
            <div class="card">
                <div class="card-header">
                    API Feeds
                </div>
                <div class="card-body">
                    {{-- Wakatime Stats --}}
                    <div id="wakatime" class="card">
                        <div class="card-header">
                            Wakatime Stats
                        </div>
                        <div id="waka-stats" class="card-body">
                            <div class="waka-stats">
                                <div class="waka-week-wrapper">
                                    <p class="text-right">This week: </p><div id="waka-time">0</div>
                                </div>
                                <div class="waka-lang-wrapper">
                                    <p>Languages:</p>
                                    <div class="waka-lang-list">
                                        <ul id="waka-list" class="my-card-list">
                                            {{-- js list injection here --}}
                                        </ul>
                                    </div>                            
                                </div>
                            </div>
                        </div>
                    </div> {{-- End Wakatime stats --}}

                    {{-- Weather API --}}
                    <div class="card">
                        <div class="card-header">
                            Weather
                        </div>
                        <div class="card-body">
                            <p>Location:</p>
                            <p>Temp:</p>
                            <p>Wind:</p>
                        </div> {{-- End Weather API body --}}
                    </div>
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
                            {{-- Tags --}}
                    <div class="card">
                        <div class="card-body">
                            <form class="my-form" action="/tags" method="POST">
                                {{ csrf_field() }}
                                <label for="name"></label>
                                <input type="text" name="name">
                                <button type="submit">Add Tag</button>
                            </form>                            
                            @if (count($tags) > 0)                        
                                <ul class="my-card-list">
                                    @foreach ($tags as $tag)
                                        <li>
                                            {{ $tag->name }}
                                            <form action="/tags/{{ $tag->id }}" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <button class="delete-icon deleteConfirm" type="submit"><i class="far fa-trash-alt ml-2"></i></button>
                                            </form>
                                        </li>
                                    @endforeach
                                @else 
                                    <p>No tags found</p>
                                </ul>
                            @endif
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
