<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>seascape</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <link rel="stylesheet" href="{{ asset('logo.png') }}">
    </head>
    <body>
        <div id="app">
            @guest
            <header class="full-height text-center p-5 header">
                <div class="container-fluid text-light">
                    <div class="row">
                        <div class="col-md-12">
                            <img src="{{ asset('logo.png') }}" alt="">
                        </div>
                    </div>
                    <div class="row my-5">
                        <div class="col-md-12 ">
                            <h4>How does pollution impact our air, our oceans, and us in urban and regional areas?</h4>
                            <h5>With open government data, we help you understand our atmosphere and hydrosphere.</h5>
                        </div>
                        <div class="col-md-12 mt-5" style="z-index: 1;">
                            <a href="{{ route('login') }}" class="btn btn-outline-light btn-250 btn-radius-left">Login</a>
                            <a href="#mapContainer" class="btn btn-outline-light btn-250 rounded-0">Try it!</a>
                            <a href="{{ route('register') }}" class="btn btn-outline-light btn-250 btn-radius-right">Register</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mt-5">
                            <p class="text-monospace">
                                <small>
                                    GH:\> isobelle mead \ emilian roman \ michael dolphin \ ryan \ jason _
                                </small>
                            </p>
                        </div>
                    </div>
                    <div class="row no-gutters" style="position: absolute; top: 0; left: 0;">
                        <video playsinline autoplay muted loop>
                            <source src="{{ asset('background.webm') }}" type="video/webm">
                        </video>
                    </div>
                </div>
            </header>
            @endguest
            @include('map')
        </div>

        <script src="{{asset('js/app.js')}}"></script>
        <script src="{{asset('js/parallax.min.js')}}"></script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDmRcarfXPtbpOPF1QAcUTvmcAuiSVVYcw&libraries=places&callback=initMap"
        async defer></script>
    </body>
</html>
