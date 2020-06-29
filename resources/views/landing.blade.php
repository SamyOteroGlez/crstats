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
                            <input type="text" class="form-control" placeholder="#LUU8CPJU"
                                id="clan_tag" name="clan_tag"
                                aria-label="Search" aria-describedby="btn-clan-tag">
                            <div class="input-group-append">
                                <button class="btn btn-outline-dark" type="submit" id="btn-clan-tag">Buscar</button>
                            </div>
                        </div>
                        <!-- <input class="form-control mr-sm-2" type="search" placeholder="#LUU8CPJU" aria-label="Search" id="clan_tag" name="clan_tag">
                        <button class="btn btn-outline-dark my-2 my-sm-0 mt-1" type="submit">Buscar</button> -->
                    </form>
                </div>

                <div class="col-md-6">
                    <h4>Jugador</h4>
                    <form class="form-inline my-2 my-lg-0" method="POST" action="{{ route('player.tag') }}">
                        @csrf
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="#P2VR0GUV"
                                id="player_tag" name="player_tag"
                                aria-label="Search" aria-describedby="btn-player-tag">
                            <div class="input-group-append">
                                <button class="btn btn-outline-dark" type="submit" id="btn-player-tag">Buscar</button>
                            </div>
                        </div>
                        <!-- <input class="form-control mr-sm-2" type="search" placeholder="#P2VR0GUV" aria-label="Search" id="player_tag" name="player_tag">
                        <button class="btn btn-outline-dark my-2 my-sm-0 mt-1" type="submit">Buscar</button> -->
                    </form>
                </div>

            </div>

        </div>

        @include('_scripts')

        @yield('scripts')

    </body>

</html>
