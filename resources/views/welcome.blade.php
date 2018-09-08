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
            <header class="text-center my-5">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <img src="{{ asset('logo.png') }}" alt="">
                        </div>
                    </div>
                    <div class="row mt-5">
                        <div class="col-md-12">
                            <a href="{{ route('login') }}" class="btn btn-primary btn-250 btn-radius-left text-light">Login</a>
                            <a href="#mapContainer" class="btn btn-secondary btn-250 rounded-0 text-light">Try it!</a>
                            <a href="{{ route('register') }}" class="btn btn-primary btn-250 btn-radius-right text-light">Register</a>
                        </div>
                    </div>
                </div>
            </header>
            @endguest
            @include('map')
        </div>

        <script src="{{asset('js/app.js')}}"></script>

        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDmRcarfXPtbpOPF1QAcUTvmcAuiSVVYcw&libraries=places&callback=initMap"
        async defer></script>
    </body>
</html>
