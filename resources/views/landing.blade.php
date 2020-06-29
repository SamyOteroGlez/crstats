<!DOCTYPE html>

<html lang="es">

    <head>

        @include('_meta_tags')

        <title>{{ env('APP_NAME') }}</title>

        @include('_styles')

        <link rel="icon" type="image/x-icon" href="{{ asset('/favicon.png') }}"/>

    </head>

    <body>

        <div class="container mt-5">

            <h1 class="mb-3">Clash Royale</h1>
            <h6>
                @lang('html.landing.locale')
            </h6>
            <select id="set-locale" class="form-control form-control-sm col-1 bt-5">
                <option value="en">EN</option>
                <option value="es">ES</option>
            </select>
            <h6 class="card-subtitle mt-5 mb-5 text-muted">
                @lang('html.landing.sub_header')
            </h6>
            <div class="clearfix"></div>

            <div class="row mt-3">

                <div class="col-md-6">
                    <h4>
                        @lang('html.landing.clans_label')
                    </h4>
                    <form class="form-inline my-2 my-lg-0" method="POST" action="{{ route('clan.tag') }}">
                        @csrf
                        <input id="locale" name="locale" type="hidden" value="">
                        <div class="input-group mb-3">
                            <input type="text"
                                class="form-control @if($errors->has('clan_tag') || Session::has('no_clan')) is-invalid @endif"
                                placeholder="#LUU8CPJU"
                                id="clan_tag" name="clan_tag"
                                aria-label="Search" aria-describedby="btn-clan-tag">
                            <div class="input-group-append">
                                <button class="btn btn-outline-dark" type="submit" id="btn-clan-tag">
                                    @lang('html.landing.submit_btn')
                                </button>
                            </div>
                        </div>
                        @if($errors->has('clan_tag'))
                        <div class="invalid-feedback" style="display: initial;">
                         @lang('validation.clan_tag')
                        </div>
                        @endif
                        @if(Session::has('no_clan'))
                        <div class="invalid-feedback" style="display: initial;">
                         {{ Session::get('no_clan') }}
                        </div>
                        @endif
                    </form>
                </div>

                <div class="col-md-6">
                    <h4>
                        @lang('html.landing.players_label')
                    </h4>
                    <form class="form-inline my-2 my-lg-0" method="POST" action="{{ route('player.tag') }}">
                        @csrf
                        <input id="locale" name="locale" type="hidden" value="">
                        <div class="input-group mb-3">
                            <input type="text"
                                class="form-control @if($errors->has('player_tag') || Session::has('no_player')) is-invalid @endif"
                                placeholder="#P2VR0GUV"
                                id="player_tag" name="player_tag"
                                aria-label="Search" aria-describedby="btn-player-tag">
                            <div class="input-group-append">
                                <button class="btn btn-outline-dark" type="submit" id="btn-player-tag">
                                    @lang('html.landing.submit_btn')
                                </button>
                            </div>
                        </div>
                        @if($errors->has('player_tag'))
                        <div class="invalid-feedback" style="display: initial;">
                         @lang('validation.player_tag')
                        </div>
                        @endif
                        @if(Session::has('no_player'))
                        <div class="invalid-feedback" style="display: initial;">
                         {{ Session::get('no_player') }}
                        </div>
                        @endif
                    </form>
                </div>

            </div>

        </div>

        @include('_scripts')

        @yield('scripts')

    </body>

</html>
