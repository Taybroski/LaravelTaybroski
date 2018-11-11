<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
  <!-- Styles -->
  <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
  {{-- Scripts --}}
  <script
    src="https://code.jquery.com/jquery-3.3.1.js"
    integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
    crossorigin="anonymous"></script>
    <script src="{{ asset('js/app.js') }}"></script>
  <title>Jsy | Taybroski</title>
</head>
<body>
  
  <div class="meta-container">
    @yield('content')
  </div>

</body>
</html>