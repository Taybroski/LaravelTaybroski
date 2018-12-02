@extends('layouts.app')
@section('body_class', 'dashboard-page')

@section('content')

    <div class="dashboard-container">
        <div class="card">
            <div class="card-header"><i class="fas fa-user-ninja mr-2"></i>Dashboard</div>

            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                {{ \Auth::user()->name }}, You are logged in!
                <br>
                <a class="text-muted" style="text-decoration:underline; font-weight:bold;" href="/POST/create">Create a Post</a>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                Your Blog Posts
            </div>
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
                                Comments
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
                                    <a href="/posts/{{ $p->slug }}/edit"><i class="far fa-edit"></i></a>
                                </td>
                                <td>
                                    <form action="/posts/{{ $p->slug }}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button class="delete-icon" id="deleteConfirm" type="submit"><i class="far fa-trash-alt"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
