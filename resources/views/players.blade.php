@extends('layout')

@section('header')

    @include('_banner')

@stop

@section('content')

    <div class="card">

        <h5 class="card-header text-white bg-dark">{{ $player->name}}</h5>

        <div class="card-body">

            <h5 class="card-title">{{ $player->tag }}</h5>
            <h5 class="card-title">{{ $player->arena->name }}</h5>

            <p>
                <b>Role:</b> {{ $player->role }}
            </p>
            <p>
                <b>Nivel:</b> {{ $player->expLevel }}
            </p>
            <p>
                <b>Trofeos:</b> {{ $player->trophies }} - <b>Mejor:</b> {{ $player->bestTrophies }}
            </p>
            <p>
                <b>Ganados:</b> {{ $player->wins }} - <b>Perdidos:</b> {{ $player->losses }}
            </p>
            <p>
                <b>Batallas:</b> {{ $player->battleCount }} - <b>Tres Coronas:</b> {{ $player->threeCrownWins }}
            </p>
            <p>
                <b>Cartas en Desafios:</b> {{ $player->challengeCardsWon }} - <b>Victorias Maximas en Desafios:</b> {{ $player->challengeMaxWins }}
            </p>
            <p>
                <b>Cartas en Torneos:</b> {{ $player->tournamentCardsWon }} - <b>Batallas en Torneos:</b> {{ $player->tournamentBattleCount }}
            </p>
            <p>
                <b>Donaciones:</b> {{ $player->donations }} - <b>Donaciones Recibidas:</b> {{ $player->donationsReceived }} - <b>Donaciones Totales:</b> {{ $player->totalDonations }}
            </p>
            <p>
                <b>Victorias en Dia de Guerra:</b> {{ $player->warDayWins }} - <b>Cartas Collectadas en el Dia de Guerra:</b> {{ $player->clanCardsCollected }}
            </p>

            <hr/>
            <h5>Resultados de Temporada</h5>
            <p>
                <b>Temporada actual:</b> {{ $player->leagueStatistics->currentSeason->trophies }} - <b>Mejor:</b> {{ $player->leagueStatistics->currentSeason->bestTrophies }}
            </p>
            @if (property_exists($player->leagueStatistics, 'previousSeason'))
            <p>
                <b>Temporada Anterior:</b> {{ $player->leagueStatistics->previousSeason->trophies }} -
                <b>Mejor:</b> {{ $player->leagueStatistics->previousSeason->bestTrophies }}
            </p>
            @endif

            @if (property_exists($player->leagueStatistics, 'bestSeason'))
            <p>
                <b>Mejor Temporada:</b> {{ $player->leagueStatistics->bestSeason->trophies }}
            </p>
            @endif

            <hr/>
            <h5>Cofres</h5>
            <div class="row">
            @foreach ($chests->items as $chest)
                <img src="{{ $chest->src }}" class="mb-3" style="margin: 3px;" width="70px class="rounded float-left" alt="{{ $chest->name }}">
            @endforeach
            </div>
            <div class="clearfix"></div>

            <hr/>
            <h5>Mazo Actual</h5>
            <div class="row">
            @foreach ($player->currentDeck as $deck)
                <div class="card text-white bg-dark mb-3 mr-1" style="width: 12rem;">
                    <img src="{{ $deck->iconUrls->medium }}" class="card-img-top" alt="{{ $deck->name }}">
                    <hr/>
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

            <hr/>
            <h5>Cartas</h5>
            <div class="row">
            @foreach ($player->cards as $card)
                <img src="{{ $card->iconUrls->medium }}" width="100px class="rounded float-left" alt="{{ $card->name }}">
            @endforeach
            </div>
            <div class="clearfix"></div>
            <br/>

            <a href="{{ route('ranking') }}" class="btn btn-outline-primary">Ranking</a>

        </div>
    </div>

@stop
