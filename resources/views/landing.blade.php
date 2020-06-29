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

            <h1 class="mb-5">Clash Royale</h1>

            <div class="row">

                <div class="col-md-6">
                    <h4>Clanes</h4>
                    <form class="form-inline my-2 my-lg-0" method="POST" action="{{ route('clan.tag') }}">
                        @csrf
                        <div class="input-group mb-3">
                            <input type="text"
                                class="form-control @if($errors->has('clan_tag') || Session::has('no_clan')) is-invalid @endif"
                                placeholder="#LUU8CPJU"
                                id="clan_tag" name="clan_tag"
                                aria-label="Search" aria-describedby="btn-clan-tag">
                            <div class="input-group-append">
                                <button class="btn btn-outline-dark" type="submit" id="btn-clan-tag">Buscar</button>
                            </div>
                        </div>
                        @if($errors->has('clan_tag'))
                        <div class="invalid-feedback" style="display: initial;">
                         {{ $errors->first('clan_tag') }}
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
                    <h4>Jugador</h4>
                    <form class="form-inline my-2 my-lg-0" method="POST" action="{{ route('player.tag') }}">
                        @csrf
                        <div class="input-group mb-3">
                            <input type="text"
                                class="form-control @if($errors->has('player_tag') || Session::has('no_player')) is-invalid @endif"
                                placeholder="#P2VR0GUV"
                                id="player_tag" name="player_tag"
                                aria-label="Search" aria-describedby="btn-player-tag">
                            <div class="input-group-append">
                                <button class="btn btn-outline-dark" type="submit" id="btn-player-tag">Buscar</button>
                            </div>
                        </div>
                        @if($errors->has('player_tag'))
                        <div class="invalid-feedback" style="display: initial;">
                         {{ $errors->first('player_tag') }}
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
