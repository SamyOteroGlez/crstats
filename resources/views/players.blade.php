@extends('layout_pages')

@section('content_pages')

    <div class="card">

        <h5 class="card-header text-white bg-dark">
            <image src="{{ asset('/images/levels/' . $player->expLevel . '.png') }}" width="40px" title="Nivel"></image>
            {{ $player->name}}
        </h5>

        <div class="card-body">

            <h6 class="card-subtitle mb-2 text-muted">{{ $player->tag }}</h6>
            <p>
                <image src="{{ asset('/images/ui/logo.png') }}" width="90px" title="Role"></image>
                {{ $player->role }}
            </p>

            <h5 class="card-title">
                <image src="{{ asset('/images' . $player->arena->img) }}" width="70px" title="Arena"></image>
                {{ $player->arena->label }}

                <image src="{{ asset('/images' . $player->arena->league) }}" class="ml-4" width="70px" title="League"></image>
                {{ $player->arena->tag }}
            </h5>

            <hr/>
            <p>
                <image src="{{ asset('/images/ui/yes-confirm.png') }}" width="30px" title="Ganados"></image>
                <b>Ganados:</b>{{ $player->wins }}

                <image src="{{ asset('/images/ui/no-cancel.png') }}" width="30px" class="ml-4" title="Perdidos"></image>
                <b>Perdidos:</b>{{ $player->losses }}

                <image src="{{ asset('/images/ui/battle.png') }}" width="30px" class="ml-4" title="Batallas"></image>
                <b>Batallas:</b>{{ $player->battleCount }}

                <image src="{{ asset('/images/ui/gold-three.png') }}" width="30px" class="ml-4" title="Tres coronas"></image>
                <b>Tres Coronas:</b>{{ $player->threeCrownWins }}
            </p>
            <div class="clearfix"></div>
            <p>
                <image src="{{ asset('/images/ui/deck.png') }}" width="30px" title="Cartas en desafio"></image>
                <b>Cartas en Desafios:</b>{{ $player->challengeCardsWon }}

                <image src="{{ asset('/images/ui/leaderboard.png') }}" width="30px" class="ml-4" title="Victorias maximas en desafios"></image>
                <b>Victorias en Desafios:</b>{{ $player->challengeMaxWins }}
            </p>
            <div class="clearfix"></div>
            <p>
                <image src="{{ asset('/images/ui/deck.png') }}" width="30px" title="Cartas en torneos"></image>
                <b>Cartas en Torneos:</b> {{ $player->tournamentCardsWon }}

                <image src="{{ asset('/images/ui/battle.png') }}" width="30px" class="ml-4" title="Batallas en torneos"></image>
                <b>Batallas en Torneos:</b> {{ $player->tournamentBattleCount }}
            </p>
            <div class="clearfix"></div>
            <p>
                <image src="{{ asset('/images/ui/draft.png') }}" width="30px" title="Donaciones"></image>
                <b>Donaciones:</b> {{ $player->donations }}

                <image src="{{ asset('/images/ui/draft.png') }}" width="30px" class="ml-4" title="Donaciones recibidas"></image>
                <b>Donaciones Recibidas:</b> {{ $player->donationsReceived }}

                <image src="{{ asset('/images/ui/draft.png') }}" width="30px" class="ml-4" title="Donaciones totales"></image>
                <b>Donaciones Totales:</b> {{ $player->totalDonations }}
            </p>
            <div class="clearfix"></div>
            <p>
                <image src="{{ asset('/images/ui/clan-battle-win.png') }}" width="30px" title="Victorias en dia de guerra"></image>
                <b>Victorias en Dia de Guerra:</b> {{ $player->warDayWins }}

                <image src="{{ asset('/images/ui/deck.png') }}" width="30px" class="ml-4" title="Cartas collectadas en la guerra"></image>
                <b>Cartas Collectadas en la Guerra:</b> {{ $player->clanCardsCollected }}
            </p>
            <div class="clearfix"></div>

            <hr/>
            @if (property_exists($player, 'leagueStatistics'))

                @if (property_exists($player->leagueStatistics, 'currentSeason'))
                <h5>Resultados de Temporada</h5>
                <p>
                    <b>Temporada actual:</b>
                    <image src="{{ asset('/images/ui/trophy.png') }}" width="30px" title="Temporada actual"></image>
                    {{ $player->leagueStatistics->currentSeason->trophies }}

                    <image src="{{ asset('/images/ui/leaderboard.png') }}" width="30px" class="ml-4" title="Mejor resultados"></image>
                    <b>Mejor:</b> {{ $player->leagueStatistics->currentSeason->bestTrophies }}
                </p>
                @endif

                @if (property_exists($player->leagueStatistics, 'previousSeason'))
                <p>
                    <b>Temporada Anterior:</b>
                    <image src="{{ asset('/images/ui/trophy.png') }}" width="30px" title="Temporada anterior"></image>
                    {{ $player->leagueStatistics->previousSeason->trophies }}

                    <image src="{{ asset('/images/ui/leaderboard.png') }}" width="30px" class="ml-4" title="Mejor resultados"></image>
                    {{ $player->leagueStatistics->previousSeason->bestTrophies }}
                </p>
                @endif

                @if (property_exists($player->leagueStatistics, 'bestSeason'))
                <p>
                    <b>Mejor Temporada:</b>
                    <image src="{{ asset('/images/ui/leaderboard.png') }}" width="30px" title="Mejor resultados"></image>
                    {{ $player->leagueStatistics->bestSeason->trophies }}
                </p>
                @endif
            <hr/>
            @endif

            <h5>Cofres</h5>
            <div class="row">
            @foreach ($chests->items as $chest)
                <img src="{{ $chest->src }}" class="mb-3" style="margin: 3px;" width="70px class="rounded float-left" title="{{ $chest->name }}">
            @endforeach
            </div>
            <div class="clearfix"></div>

            <hr/>
            <h5>Mazo Actual</h5>
            <div class="row">
            @foreach ($player->currentDeck as $deck)
                <div class="card text-white bg-dark mb-3 mr-1" style="width: 12rem;">
                    <img src="{{ $deck->iconUrls->medium }}" class="card-img-top" title="{{ $deck->name }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $deck->name }}</h5>
                        <p class="card-text">
                            <b>Nivel: </b> {{ $deck->level }}
                        </p>
                    </div>
                </div>
            @endforeach
            </div>
            <div class="clearfix"></div>

            @if (property_exists($player, 'currentFavouriteCard'))
            <hr/>
            <h5>Carta Favorita</h5>
            <div class="row">
                <div class="card text-white bg-dark mb-3 mr-1" style="width: 12rem;">
                    <img src="{{ $player->currentFavouriteCard->iconUrls->medium }}" class="card-img-top" title="{{ $player->currentFavouriteCard->name }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $player->currentFavouriteCard->name }}</h5>
                        <p class="card-text">
                            <b>Nivel Maximo: </b> {{ $player->currentFavouriteCard->maxLevel }}
                        </p>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
            @endif

            <hr/>
            <h5>Cartas ({{ count($player->cards) }} de {{ $totalCards }})</h5>
            <div class="row">
            @foreach ($player->cards as $card)
                <img src="{{ $card->iconUrls->medium }}" width="100px class="rounded float-left" title="{{ $card->name }}">
            @endforeach
            </div>
            <div class="clearfix"></div>
            <hr/>
            <a href="{{ route('ranking') }}" class="btn btn-outline-primary">Ranking</a>

        </div>
    </div>

@stop
