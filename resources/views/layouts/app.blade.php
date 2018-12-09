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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.20.1/moment.min.js"></script>
    <script src="https://cdn.ckeditor.com/4.11.1/standard/ckeditor.js"></script>  
    <script src="{{ asset('js/app.js') }}"></script>
</head>
    <body class="@yield('body_class')">
        
    <div class="meta-container">
        @if (Request::url() !== url('/'))
            @include('partials.navbar')   
            <div class="mobile-nav"></div>     
            {{-- <div class="mobile-nav-clear"></div> --}}
        @endif
        @include('partials.messages')
        @yield('content')
    </div>



    {{-- Google Map API --}}
    <script>

        var mapContainer = $(".map-container");
        var loader = $(".map-loader");  
        var mapLat = $(".map-lat");
        var mapLng = $(".map-lng");
        if (mapContainer.length) {
            console.log("Map Here");
         
            var jersey = { lat: 49.214439, lng: -2.131250 };
            var lat, lng, map, marker, infoWindow;
            // Initialize the map
            function initMap() {
                map = new google.maps.Map(document.getElementById("map"), {
                    zoom: 11,
                    center: jersey
                });
                // Add a marker, positioned as jersey
                marker = new google.maps.Marker({ 
                    position: jersey, 
                    map: map,
                    draggable: true,
                    animation: google.maps.Animation.DROP
                });
                // Geolocation - Moves  google map pin to current location.
                infoWindow = new google.maps.InfoWindow();
                // HTML5 geolocation.
                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(
                        function(position) {                                     
                            var pos = {
                                lat: position.coords.latitude,
                                lng: position.coords.longitude
                            };
                            // set the marker position
                            marker.setPosition(pos);
                            // Recenter the map
                            map.setCenter(pos);
                            // Remove loader 
                            loader.css("display", "none");
                            mapLat.html(pos.lat);
                            mapLng.html(pos.lng);
                        },
                        function() {
                            handleLocationError(true, infoWindow, map.getCenter());
                        }
                    );
                } else {
                    // Browser doesn't support Geolocation
                    handleLocationError(false, infoWindow, map.getCenter());
                }
            }
        }
    </script>
    <script
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyADYBLUEQuy2JabJonOvPFx1-WidJV8F14&callback=initMap" async defer>
    </script>

</body>
</html>