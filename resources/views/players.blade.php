@extends('layout_pages')

@section('content_pages')

    <h2 class="mb-3">
        <image src="{{ asset('/images/levels/' . $player->expLevel . '.png') }}" width="45px" title="Nivel"></image>
        {{ $player->name}}
    </h2>

    <div class="card">

        <h5 class="card-header text-white bg-dark">Stats</h5>

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

            <p>
                <image src="{{ asset('/images/ui/yes-confirm.png') }}" width="30px" title="Ganados"></image>
                <b>Ganados:</b>{{ $player->wins }}

                <image src="{{ asset('/images/ui/no-cancel.png') }}" width="30px" class="ml-4" title="Perdidos"></image>
                <b>Perdidos:</b>{{ $player->losses }}

                <image src="{{ asset('/images/ui/battle.png') }}" width="30px" class="ml-4" title="Batallas totales"></image>
                <b>Batallas Totales:</b>{{ $player->battleCount }}

                <image src="{{ asset('/images/ui/gold-three.png') }}" width="30px" class="ml-4" title="Tres coronas"></image>
                <b>Tres Coronas:</b>{{ $player->threeCrownWins }}
            </p>
            <div class="row">
                <div class="col-md-6">
                    <canvas id="percentage" width="200" height="200"></canvas>
                </div>
                <div class="col-md-6">
                    <canvas id="stats" width="200" height="200"></canvas>
                </div>
            </div>
            <hr/>
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

        </div>
    </div>
    <div class="clearfix"></div>
    <hr/>

    <h2 class="mt-4 mb-3">Cofres</h2>

    <div class="card">

        <h5 class="card-header text-white bg-dark">Proximos Cofres</h5>

        <div class="card-body">

            <div class="row">
            @foreach ($chests->items as $chest)
                <img src="{{ $chest->src }}" class="mb-3" style="margin: 3px;" height="60px" class="rounded float-left" title="{{ $chest->name }}">
            @endforeach
            </div>

        </div>

    </div>
    <div class="clearfix"></div>
    <hr/>

    <h2 class="mt-4 mb-3">Mazo</h2>

    <div class="card">

        <h5 class="card-header text-white bg-dark">Actual</h5>

        <div class="card-body">
            <div class="row">
            @foreach ($player->currentDeck as $deck)
                <div class="card text-white bg-dark mb-3 mr-1 ml-1 rounded-lg" style="width: 13rem;">
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
            <h6 class="card-subtitle mb-2 text-muted">Carta Favorita</h6>
            <div class="row">
                <div class="card text-white bg-dark mb-3 mr-1 ml-1 rounded-lg" style="width: 12rem;">
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

        </div>

    </div>
    <div class="clearfix"></div>
    <hr/>

    <h2 class="mt-4 mb-3">Cartas</h2>

    <div class="card">

        <h5 class="card-header text-white bg-dark">{{ count($player->cards) }} de {{ $totalCards }}</h5>

        <div class="card-body">
            <div class="row">
            @foreach ($player->cards as $card)
                <img src="{{ $card->iconUrls->medium }}" width="100px class="rounded float-left mr-1 ml-1" title="{{ $card->name }}">
            @endforeach
            </div>

        </div>

    </div>
    <div class="clearfix"></div>


    <a href="{{ route('ranking') }}" class="btn btn-outline-dark mt-5">Ranking</a>

@stop

@section('scripts')

    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js"
        integrity="sha256-R4pqcOYV8lt7snxMQO/HSbVCFRPMdrhAFMH+vr9giYI="
        crossorigin="anonymous"></script>

        <script>

            var stats_ctx = document.getElementById('stats').getContext('2d');
            var stats = new Chart(stats_ctx, {
                type: 'doughnut',
                data: {
                    datasets: [{
                        label: 'Batallas totales: {{ $player->battleCount }}',
                        data: [
                            {{ $player->losses }},
                            {{ $player->wins }},
                            {{ $player->battleCount - ($player->wins + $player->losses) }},
                        ],
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(54, 162, 235, 1)',
                        ],
                        borderWidth: 1
                    }],
                    labels: [
                        'Derrotas',
                        'Victorias',
                        'Empates y 2v2'

                    ],
                },
            });

            var percentage_ctx = document.getElementById('percentage');
            var percentage = new Chart(percentage_ctx, {
                type: 'bar',
                data: {
                    labels: [
                        '% de Victorias/Derrotas'
                    ],
                    datasets: [
                        {
                            label: '% de Victorias',
                            data: [
                                {{ $player->wins * 100 / ($player->wins + $player->losses) }},
                            ],
                            backgroundColor: [
                                'rgba(75, 192, 192, 0.2)',

                            ],
                            borderColor: [
                                'rgba(75, 192, 192, 1)',
                            ],
                            borderWidth: 1
                        },
                        {
                            label: '% de Derrotas',
                            data: [
                                {{ $player->losses * 100 / ($player->wins + $player->losses) }}
                            ],
                            backgroundColor: [
                                'rgba(255, 99, 132, 0.2)',

                            ],
                            borderColor: [
                                'rgba(255, 99, 132, 1)',
                            ],
                            borderWidth: 1
                        }
                    ]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                },
            });
        </script>

@stop
