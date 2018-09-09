<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'seascape') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <link rel="stylesheet" href="{{ asset('logo.png') }}">
</head>
<body>
<div id="app">
    @guest
        <header class="text-center p-5 header" style="min-height:80vh; position: relative;">
            <div class="container-fluid text-light">
                <div class="row">
                    <div class="col-md-12">
                        <img src="{{ asset('logo.png') }}" class="img-fluid" style="width: 256px">
                    </div>
                    <div class="col-md-12 mt-2">
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
                                GH:\> isobelle \ emilian \ michael \ ryan \ jason _
                            </small>
                        </p>
                    </div>
                </div>
                <div class="row no-gutters video-wrapper" style="position: absolute; top: 0; left: 0;">
                    <video playsinline autoplay muted loop>
                        <source src="{{ asset('background.webm') }}" type="video/webm">
                    </video>
                </div>
            </div>
        </header>
        <section class="section-01 d-flex align-items-center">
            <div class="container-fluid text-light">
                <div class="row">
                    <div class="col-md-6 offset-0 offset-md-3 mt-5 text-justify">
                        <h1 class="text-left">Our Mission</h1>
                        <p>
                            Every day, analysts endeavour to discover how powerful and valuable data is. It is the
                            greatest potential source of knowledge, and with the right data, we can find answers to
                            almost any question.
                        </p>
                        <p>
                            The problem is the accessibility of data to people. Raw numbers are strange and unintuitive.
                            What people want isn't data, but statistics. What if we transformed that data into
                            a source of knowledge for anybody, regardless of their background or field?
                        </p>
                        <p>
                            With {{ config('app.name', 'seascape') }}, we aim to help you figure out the correlation between marine and
                            atmospheric pollution and the quality of life in urban and rural areas by offering
                            an intuitive and beautiful interface for you to use!
                        </p>
                        <p>
                            By leveraging open data, we produce relevant and valuable statistics for you to access
                            at your fingertip -- whether in your office at home, or when on the go.
                        </p>
                        <a href="#mapContainer" class="btn btn-outline-light btn-block mb-4">
                            Check it out!
                        </a>
                    </div>
                </div>
            </div>
        </section>
        <section class="section-02 d-flex align-items-center">
            <div class="container-fluid text-light">
                <div class="row">
                    <div class="col-md-8 offset-0 offset-md-2 mt-5 text-justify">
                        <h1 class="text-left">Our Team</h1>
                        <p>
                            We are a team of five members (in no particular order):
                        </p>
                        <table class="table">
                            <tr>
                                <td>Isobelle Mead</td>
                                <td>Graphic design, scientific interpretation. Somehow, also a chemistry teacher.</td>
                            </tr>
                            <tr>
                                <td>Emilian Roman</td>
                                <td>Front-end & back-end development/design. Monochromatic scheme, with an accent.</td>
                            </tr>
                            <tr>
                                <td>Michael Dolphin</td>
                                <td>Front-end & back-end development, video design, and database structure.</td>
                            </tr>
                            <tr>
                                <td>Ryan Hill</td>
                                <td>User layout design, secondary data crunching.</td>
                            </tr>
                            <tr>
                                <td>Jason Parre</td>
                                <td>Primary data crunching.</td>
                            </tr>
                        </table>
                        <a href="#mapContainer" class="btn btn-outline-light btn-block mb-4">
                            Check out where our quarrelling got us!
                        </a>
                    </div>
                </div>
            </div>
        </section>
    @endguest
    @include('map')
</div>

<script src="{{asset('js/app.js')}}"></script>
<script src="{{asset('js/parallax.min.js')}}"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDmRcarfXPtbpOPF1QAcUTvmcAuiSVVYcw&libraries=places&callback=initMap"
        async defer></script>
</body>
</html>



