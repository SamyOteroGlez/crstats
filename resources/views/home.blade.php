@extends('layout')

@section('header')

    @include('_header')

@stop

@section('content')

<div class="table-responsive">

        <div class="card">

            <h5 class="card-header text-white bg-dark">Guerra</h5>

            <div class="card-body">

                <p>
                    <b>Estado:</b> {{ $war->state }}
                </p>

                <p>
                    <b>Score:</b> {{ $war->clan->clanScore }}
                </p>

                <p>
                    <b>Batallas Jugadas:</b> {{ $war->clan->battlesPlayed }}
                </p>

                <p>
                    <b>Batallas Ganadas:</b> {{ $war->clan->wins }}
                </p>

                <p>
                    <b>Coronas:</b> {{ $war->clan->crowns }}
                </p>

                <hr/>

                <h5>
                    <b>Participantes:</b> {{ $war->clan->participants }}
                </h5>

                <div class="row">
                @foreach ($war->participants as $player)
                <div class="card mb-3 mr-3" >
                    <div class="card-body">
                        <h5 class="card-title">{{ $player->name }}</h5>
                        <h6 class="card-subtitle mb-2 text-muted">{{ $player->tag }}</h6>

                        <p>
                            <b>Batallas Ganadas:</b> {{ $player->wins }} -
                            <b>Batallas Jugadas:</b> {{ $player->battlesPlayed}} -
                            <b>Cartas Ganadas:</b> {{ $player->cardsEarned }}
                        </p>
                        <hr/>

                        <a href="{{ route('players', [playerTagParser($player->tag)]) }}" class="card-link">
                            Mostrar
                        </a>
                    </div>
                </div>
                @endforeach
                </div>

            </div>

        </div>

    </div>


@stop
