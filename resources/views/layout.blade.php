<!DOCTYPE html>

<html lang="es">

    <head>

        <meta charset="utf-8">
        <meta name="description" content="Stats from clans and players of Clash Royale">
        <meta name="keywords" content="clash royal, clash royale deck, clash royale arena, clash royale chest, clash royale clans, clash royale game, play clash royale">
        <meta name="author" content="Cloverpath Solutions">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ env('APP_NAME') }}</title>

        <link rel="stylesheet"
            href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
            integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk"
            crossorigin="anonymous">
        <link rel="stylesheet" type="text/css"
            href="https://cdn.datatables.net/v/bs4/jq-3.3.1/dt-1.10.21/cr-1.5.2/r-2.2.5/datatables.min.css"/>
        <link rel="stylesheet" href="{{ asset('/css/fonts.css') }}">
        <link rel="stylesheet" href="{{ asset('/css/styles.css') }}">

        @yield('css')

        <link rel="icon" type="image/x-icon" href="{{ asset('/favicon.png') }}"/>

    </head>

    <body>

        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">

            <div class="container">

                <a class="navbar-brand" href="{{ route('home') }}">
                    <img src="{{ env('CLAN_BADGE') }}" width="50px" class="rounded" alt="Clan Badge">
                    {{ env('CLAN_NAME') }}
                </a>

                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <a class="nav-item nav-link @if(isRoute('home'))active @endif" href="{{ route('home') }}">
                            Inicio <span class="sr-only">(current)</span>
                        </a>
                        <a class="nav-item nav-link @if(isRoute('clan-war'))active @endif" href="{{ route('clan.war') }}">
                            Guerra
                        </a>
                        <a class="nav-item nav-link @if(isRoute('stats'))active @endif" href="{{ route('stats') }}">
                            Stats
                        </a>
                        <a class="nav-item nav-link @if(isRoute('other'))active @endif" href="{{ route('other') }}">
                            Otros
                        </a>
                    </div>
                </div>

                <button class="navbar-toggler" type="button"
                    data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

            </div>

        </nav>

        @yield('header')

        <div class="container mt-5">

            @yield('body')

        </div>

        <button id="move-top" class="move-top btn btn-outline-dark btn-sm float-right mr-5">
            Top
        </button>

        <footer class="mt-5" height="200px">
            <div class="container">
                <div class="row pt-5">
                    <div class="col-md-8">
                        <ul class="nav flex-column footer-links">
                            <li class="nav-item">
                                <a class="nav-link @if(isRoute('home')) f-active @endif" href="{{ route('home') }}">
                                    Inicio
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link @if(isRoute('clan-war')) f-active @endif" href="{{ route('clan.war') }}">
                                    Guerra
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link @if(isRoute('stats')) f-active @endif" href="{{ route('stats') }}">
                                    Stats
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link @if(isRoute('other')) f-active @endif" href="{{ route('other') }}">
                                    Otros
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-4">
                        <image src="{{ asset('/images/ui/logo.png') }}" width="100px" class="mt-5" title="Clash Royale"></image>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
        </footer>

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
            integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
            crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
            integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
            crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
            integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI"
            crossorigin="anonymous"></script>
        <script type="text/javascript"
            src="https://cdn.datatables.net/v/bs4/jq-3.3.1/dt-1.10.21/cr-1.5.2/r-2.2.5/datatables.min.js"></script>

        <script>

            $(window).scroll(function() {
                options = {
                    speed: 'slow',
                    easing: 'linear'
                };

                if ($(this).scrollTop()) {
                    $('#move-top').fadeIn(options);
                } else {
                    $('#move-top').fadeOut(options);
                }
            });

            $("#move-top").click(function () {
                $("html, body").animate({scrollTop: 0}, 1000);
            });

        </script>

        @yield('scripts')

    </body>

</html>
