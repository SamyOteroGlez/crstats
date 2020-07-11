@extends('layout_pages')

@section('content_pages')

    <h2 class="mb-3">
        <image src="{{ asset('/images/levels/' . $player->expLevel . '.png') }}"
            width="45px" title="{{ trans('html.player.img_lvl') }}"></image>
        {{ $player->name}}
        <small class="text-muted xs-small">{{ $player->tag }}</small>
    </h2>

    <div class="card">

        <h5 class="card-header text-white bg-dark">
            {{ trans('html.player.stats') }}
        </h5>

        <div class="card-body">

            @if(property_exists($player, 'clan'))
            <form class="mb-3" method="POST" action="{{ route('clan.tag') }}">
                @csrf
                <input type="hidden" id="clan_tag" name="clan_tag" value="{{ $player->clan->tag }}">
                Clan:
                <button class="btn btn-sm btn-outline-dark">
                {{ $player->clan->name }}
                </button>
            </form>
            @else
            <h6 class="card-subtitle text-muted mb-3"><small>No Clan</small></h6>
            @endif

            @if(property_exists($player, 'role'))
            <p>
                <image src="{{ asset('/images/ui/logo.png') }}"
                    width="90px" title="{{ trans('html.player.img_role') }}"></image>
                {{ $player->role }}
            </p>
            @endif

            <h5 class="card-title">
                <image src="{{ asset('/images' . $player->arena->img) }}"
                    width="70px" title="{{ trans('html.player.img_arena') }}"></image>
                {{ $player->arena->label }}

                <image src="{{ asset('/images' . $player->arena->league) }}" class="ml-4"
                    width="70px" title="{{ trans('html.player.img_league') }}"></image>
                {{ $player->arena->tag }}
            </h5>
            <hr/>

            @if (property_exists($player, 'leagueStatistics'))

                @if (property_exists($player->leagueStatistics, 'currentSeason'))
                <h5>
                    {{ trans('html.player.season_results') }}
                </h5>
                <p>
                    <b>{{ trans('html.player.current_season') }}:</b>
                    <image src="{{ asset('/images/ui/trophy.png') }}"
                        width="30px" title="{{ trans('html.player.current_season') }}"></image>
                    {{ $player->leagueStatistics->currentSeason->trophies }}

                    @if (property_exists($player->leagueStatistics->currentSeason, 'bestTrophies'))
                    <image src="{{ asset('/images/ui/leaderboard.png') }}" width="30px" class="ml-4"
                        title="{{ trans('html.player.best_score') }}"></image>
                    <b>{{ trans('html.player.best_score') }}:</b> {{ $player->leagueStatistics->currentSeason->bestTrophies }}
                    @endif
                </p>
                @endif

                @if (property_exists($player->leagueStatistics, 'previousSeason'))
                <p>
                    <b>{{ trans('html.player.prev_season') }}:</b>
                    <image src="{{ asset('/images/ui/trophy.png') }}" width="30px"
                        title="{{ trans('html.player.prev_season') }}"></image>
                    {{ $player->leagueStatistics->previousSeason->trophies }}

                    <image src="{{ asset('/images/ui/leaderboard.png') }}" width="30px"
                        class="ml-4" title="{{ trans('html.player.best_score') }}"></image>
                    {{ $player->leagueStatistics->previousSeason->bestTrophies }}
                </p>
                @endif

                @if (property_exists($player->leagueStatistics, 'bestSeason'))
                <p>
                    <b>{{ trans('html.player.best_season') }}:</b>
                    <image src="{{ asset('/images/ui/leaderboard.png') }}" width="30px"
                        title="{{ trans('html.player.best_score') }}"></image>
                    {{ $player->leagueStatistics->bestSeason->trophies }}
                </p>
                @endif
            <hr/>
            @endif

            <p>
                <image src="{{ asset('/images/ui/yes-confirm.png') }}" width="30px"
                    title="{{ trans('html.player.wins') }}"></image>
                <b>{{ trans('html.player.wins') }}:</b>{{ $player->wins }}

                <image src="{{ asset('/images/ui/no-cancel.png') }}" width="30px" class="ml-4"
                    title="{{ trans('html.player.losses') }}"></image>
                <b>{{ trans('html.player.losses') }}:</b>{{ $player->losses }}

                <image src="{{ asset('/images/ui/battle.png') }}" width="30px" class="ml-4"
                    title="{{ trans('html.player.battles_total') }}"></image>
                <b>{{ trans('html.player.battles_total') }}:</b>{{ $player->battleCount }}

                <image src="{{ asset('/images/ui/gold-three.png') }}" width="30px" class="ml-4"
                    title="{{ trans('html.player.3_crowns') }}"></image>
                <b>{{ trans('html.player.3_crowns') }}:</b>{{ $player->threeCrownWins }}
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
                <image src="{{ asset('/images/ui/deck.png') }}" width="30px"
                    title="{{ trans('html.player.challenge_cards') }}"></image>
                <b>{{ trans('html.player.challenge_cards') }}:</b>{{ $player->challengeCardsWon }}

                <image src="{{ asset('/images/ui/leaderboard.png') }}" width="30px" class="ml-4"
                    title="{{ trans('html.player.Challenge_wins') }}"></image>
                <b>{{ trans('html.player.challenge_wins') }}:</b>{{ $player->challengeMaxWins }}
            </p>
            <div class="clearfix"></div>
            <p>
                <image src="{{ asset('/images/ui/deck.png') }}" width="30px"
                    title="{{ trans('html.player.tournament_cards') }}"></image>
                <b>{{ trans('html.player.tournament_cards') }}:</b> {{ $player->tournamentCardsWon }}

                <image src="{{ asset('/images/ui/battle.png') }}" width="30px" class="ml-4"
                    title="{{ trans('html.player.tournament_battles') }}"></image>
                <b>{{ trans('html.player.torunament_battles') }}:</b> {{ $player->tournamentBattleCount }}
            </p>
            <div class="clearfix"></div>
            <p>
                <image src="{{ asset('/images/ui/draft.png') }}" width="30px"
                    title="{{ trans('html.player.donations') }}"></image>
                <b>{{ trans('html.player.donations') }}:</b> {{ $player->donations }}

                <image src="{{ asset('/images/ui/draft.png') }}" width="30px" class="ml-4"
                    title="{{ trans('html.player.donations_received') }}"></image>
                <b>{{ trans('html.player.donations_received') }}:</b> {{ $player->donationsReceived }}

                <image src="{{ asset('/images/ui/draft.png') }}" width="30px" class="ml-4"
                    title="{{ trans('html.player.donations_total') }}"></image>
                <b>{{ trans('html.player.donations_total') }}:</b> {{ $player->totalDonations }}
            </p>
            <div class="clearfix"></div>
            <p>
                <image src="{{ asset('/images/ui/clan-battle-win.png') }}" width="30px"
                    title="{{ trans('html.player.war_day_wins') }}"></image>
                <b>{{ trans('html.player.war_day_wins') }}:</b> {{ $player->warDayWins }}

                <image src="{{ asset('/images/ui/deck.png') }}" width="30px" class="ml-4"
                    title="{{ trans('html.player.war_cards') }}"></image>
                <b>{{ trans('html.player.war_cards') }}:</b> {{ $player->clanCardsCollected }}
            </p>

        </div>
    </div>
    <div class="clearfix"></div>
    <hr/>

    <h2 class="mt-4 mb-3">{{ trans('html.player.chests') }}</h2>

    <div class="card">

        <h5 class="card-header text-white bg-dark">{{ trans('html.player.next_chests') }}</h5>

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

    <h2 class="mt-4 mb-3">{{ trans('html.player.deck') }}</h2>

    <div class="card">

        <h5 class="card-header text-white bg-dark">{{ trans('html.player.current_deck') }}</h5>

        <div class="card-body">
            <div class="row">
            @foreach ($player->currentDeck as $deck)
                <div class="card text-white bg-dark mb-3 mr-1 ml-1 rounded-lg" style="width: 13rem;">
                    <img src="{{ $deck->iconUrls->medium }}" class="card-img-top" title="{{ $deck->name }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $deck->name }}</h5>
                        <p class="card-text">
                            <b>{{ trans('html.player.img_lvl') }}: </b> {{ $deck->level }}
                        </p>
                    </div>
                </div>
            @endforeach
            </div>
            <div class="clearfix"></div>

            @if (property_exists($player, 'currentFavouriteCard'))
            <hr/>
            <h6 class="card-subtitle mb-2 text-muted">
                {{ trans('html.player.favorite_card') }}
            </h6>
            <div class="row">
                <div class="card text-white bg-dark mb-3 mr-1 ml-1 rounded-lg" style="width: 12rem;">
                    <img src="{{ $player->currentFavouriteCard->iconUrls->medium }}" class="card-img-top" title="{{ $player->currentFavouriteCard->name }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $player->currentFavouriteCard->name }}</h5>
                        <p class="card-text">
                            <b>{{ trans('html.player.max_lvl') }}: </b> {{ $player->currentFavouriteCard->maxLevel }}
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

    <h2 class="mt-4 mb-3">{{ trans('html.player.cards') }}</h2>

    <div class="card">

        <h5 class="card-header text-white bg-dark">
            {{ count($player->cards) }} {{ trans('html.player.x_out_of_y') }} {{ $totalCards }}
        </h5>

        <div class="card-body">
            <div class="row">
            @foreach ($player->cards as $card)
                <img src="{{ $card->iconUrls->medium }}" width="100px class="rounded float-left mr-1 ml-1" title="{{ $card->name }}">
            @endforeach
            </div>

        </div>

    </div>
    <div class="clearfix"></div>

@stop

@section('scripts')

    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js"
        integrity="sha256-R4pqcOYV8lt7snxMQO/HSbVCFRPMdrhAFMH+vr9giYI="
        crossorigin="anonymous"></script>

        <script>

            var stats_ctx = document.getElementById('stats').getContext('2d');
            var stats = new Chart(stats_ctx, {
                type: 'pie',
                data: {
                    datasets: [{
                        label: '{{ trans("html.player.battles_total") }}: {{ $player->battleCount }}',
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
                        '{{ trans("html.player.losses") }}',
                        '{{ trans("html.player.wins") }}',
                        '{{ trans("html.player.ties_2v2") }}'
                    ],
                },
            });

            var percentage_ctx = document.getElementById('percentage');
            var percentage = new Chart(percentage_ctx, {
                type: 'bar',
                data: {
                    labels: [
                        '{{ trans("html.player.wins") }} / {{ trans("html.player.losses") }}'
                    ],
                    datasets: [
                        {
                            label: '% {{ trans("html.player.wins") }}',
                            data: [
                                {{ $player->win_percent }},
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
                            label: '% {{ trans("html.player.losses") }}',
                            data: [
                                {{ $player->losses_percent }}
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
                            display: true,
                            ticks: {
                                beginAtZero: true,
                                steps: 10,
                                stepValue: 5,
                                max: 100
                            },
                            scaleLabel: {
                                display: true,
                                labelString: '%'
                            }
                        }]
                    }
                }
            });
        </script>

@stop
