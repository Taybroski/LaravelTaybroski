<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <title>Jsy | Taybroski</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
  <!-- Styles -->
  <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
  {{-- Scripts --}}
  <script
    src="https://code.jquery.com/jquery-3.3.1.js"
    integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
    crossorigin="anonymous"></script>
  <script src="https://cdn.ckeditor.com/4.11.1/standard/ckeditor.js"></script>
  <script src="{{ asset('js/app.js') }}"></script>
</head>
<body class="@yield('body_class')">
  
  <div class="meta-container">
    @if (Request::url() !== url('/'))
    @include('partials.navbar')   
    <div class="mobile-nav"></div>     
    <div class="mobile-nav-clear"></div>     
    @endif
    @include('partials.messages')
    @yield('content')
  </div>


</body>
</html>