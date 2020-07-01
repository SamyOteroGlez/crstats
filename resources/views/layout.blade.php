<!DOCTYPE html>

<html lang="es">

    <head>

        @include('_meta_tags')

        <title>{{ env('APP_NAME') }}</title>

        @include('_styles')

        @yield('css')

        <link rel="icon" type="image/x-icon" href="{{ asset('/favicon.png') }}"/>

    </head>

    <body>

        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">

            <div class="container">

                <a class="navbar-brand" href="{{ route('home') }}">
                    {{ session('CR.CR_CLAN_NAME') }}
                </a>

                <button class="navbar-toggler" type="button"
                    data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <a class="nav-item nav-link @if(isRoute('landing'))active @endif" href="{{ route('landing') }}">
                            @lang('html.navbar.search') <span class="sr-only">(current)</span>
                        </a>

                        @if(session('CR.CLAN'))
                        <a class="nav-item nav-link @if(isRoute('home'))active @endif" href="{{ route('home') }}">
                            @lang('html.navbar.home') <span class="sr-only">(current)</span>
                        </a>
                        <a class="nav-item nav-link @if(isRoute('clan-war'))active @endif" href="{{ route('clan.war') }}">
                            @lang('html.navbar.war')
                        </a>
                        <a class="nav-item nav-link @if(isRoute('stats'))active @endif" href="{{ route('stats') }}">
                            @lang('html.navbar.stats')
                        </a>
                        @endif
                    </div>
                </div>

            </div>

        </nav>

        @yield('header')

        <div class="container mt-5">

            @yield('body')

        </div>

        <button id="move-top" class="move-top btn btn-outline-dark btn-sm float-right mr-5">
            @lang('html.navbar.top')
        </button>

        <footer class="mt-5">
            <div class="container">
                <div class="row pt-5">
                    <div class="col-md-8">
                        <ul class="nav flex-column footer-links">
                            <li class="nav-item">
                                <a class="nav-link @if(isRoute('landing')) f-active @endif" href="{{ route('landing') }}">
                                    @lang('html.navbar.search')
                                </a>
                            </li>

                            @if(session('CR.CLAN'))
                            <li class="nav-item">
                                <a class="nav-link @if(isRoute('home')) f-active @endif" href="{{ route('home') }}">
                                    @lang('html.navbar.home')
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link @if(isRoute('clan-war')) f-active @endif" href="{{ route('clan.war') }}">
                                    @lang('html.navbar.war')
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link @if(isRoute('stats')) f-active @endif" href="{{ route('stats') }}">
                                    @lang('html.navbar.stats')
                                </a>
                            </li>
                            @endif
                        </ul>
                    </div>
                    <div class="col-md-4">
                        <image src="{{ asset('/images/ui/logo.png') }}" width="100px" class="mt-5" title="Clash Royale"></image>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>

            <div class="container mt-3">
                <a class="nav-link float-left @if(isRoute('policy')) f-active @endif" href="{{ route('policy') }}">
                    <small class="sm-small">Privacy Policy</small>
                </a>
                <a class="nav-link float-left @if(isRoute('terms')) f-active @endif" href="{{ route('terms') }}">
                    <small class="sm-small">Terms and Conditions</small>
                </a>
                <a class="nav-link float-left @if(isRoute('disclaimer')) f-active @endif" href="{{ route('disclaimer') }}">
                    <small class="sm-small">Disclaimer</small>
                </a>
            </div>

            <div class="clearfix"></div>

            <div class="container mt-3">
            <hr/>
                <div class="mb-2">
                    <p>
                        <small class="xs-small">
                            This material is unofficial and is not endorsed by Supercell.
                            For more information see Supercell's Fan Content Policy:
                            <a href="https://www.supercell.com/fan-content-policy" target="_blank">
                                www.supercell.com/fan-content-policy
                            </a>.
                        </small>
                    </p>
                </div>
            </div>
            <div class="clearfix"></div>
        </footer>

        @include('_scripts')

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
