@extends('layout_pages')

@section('content_pages')

<h2 class="mt-4 mb-3">Guerra</h2>

<h6 class="card-subtitle mb-2 text-muted">
        @if('collectionDay' == $war->state) Dia de colleccion @else Dia de batalla @endif
    </h6>

<p>
    <image src="{{ asset('/images/ui/crown-shield.png') }}" width="50px" title="Puntos"></image>
    {{ $war->clan->clanScore }}

    <image src="{{ asset('/images/ui/clan-battle-win.png') }}" width="50px" class="ml-4" title="Batallas ganadas"></image>
    {{ $war->clan->wins }}

    <image src="{{ asset('/images/ui/battle.png') }}" width="50px" class="ml-4" title="Batallas jugadas"></image>
    {{ $war->clan->battlesPlayed }}

    <image src="{{ asset('/images/ui/blue-crown.png') }}" width="50px" class="ml-4" title="Coronas"></image>
    {{ $war->clan->crowns }}
</p>
<hr/>
<div class="clearfix"></div>

@if ($war->clans)
<h2 class="mt-4 mb-3">Ranking</h2>

<div class="card">

    <h5 class="card-header text-white bg-dark">Clanes</h5>

    <div class="card-body">
        <div class="row">
            <table class="table table-hover">

                <thead class="thead-light">
                    <tr>
                        <th scope="col">Clan</th>
                        <th scope="col">Trofeos</th>
                        <th scope="col">Coronas</th>
                    </tr>
                </thead>

                <tbody>

                    @foreach ($war->clans as $wc)

                    <tr>
                        <td>{{ $wc->name }}</td>
                        <td>
                            <image src="{{ asset('/images/ui/clan-battle-win.png') }}" width="30px" title="Ganados"></image>
                            {{ $wc->wins }}
                        </td>
                        <td>
                            <image src="{{ asset('/images/ui/blue-crown.png') }}" width="30px" title="Coronas"></image>
                            {{ $wc->crowns }}
                        </td>
                    </tr>

                    @endforeach

                    </tr>

                </tbody>

            </table>
        </div>

    </div>

</div>
<hr/>
<div class="clearfix"></div>
@endif

<h2 class="mt-4 mb-3">
    Participantes
</h2>

<div class="card">

    <h5 class="card-header text-white bg-dark">Miembros</h5>

    <div class="card-body">
        <div class="row">

            <div class="table-responsive">

                <table id="war" class="table table-hover">

                    <thead class="thead-light">
                        <tr>
                            <th scope="col">Nombre</th>
                            <th scope="col">Batallas Ganadas</th>
                            <th scope="col">Batallas</th>
                            <th scope="col">Cartas</th>
                        </tr>
                    </thead>

                    <tbody>

                        @foreach ($war->participants as $player)

                        <tr>
                            <td>
                                <a href="{{ route('players', [playerTagParser($player->tag)]) }}">{{ $player->name }}</a>
                            </td>
                            <td>
                                <image src="{{ asset('/images/ui/clan-battle-win.png') }}" width="30px" title="Batallas ganadas"></image>
                                {{ $player->wins }} de {{ $player->numberOfBattles }}
                            </td>
                            <td>
                                <image src="{{ asset('/images/ui/battle.png') }}" width="30px" class="ml-4" title="Batallas jugadas"></image>
                                {{ $player->battlesPlayed }} de {{ $player->numberOfBattles }}
                            </td>
                            <td>
                                <image src="{{ asset('/images/ui/deck.png') }}" width="30px" class="ml-4" title="Cartas ganadas"></image>
                                {{ $player->cardsEarned }}
                            </td>
                        </tr>

                        @endforeach

                        </tr>

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>
<div class="clearfix"></div>

@stop

@section('scripts')

<script>

    $(document).ready(function() {
        $('#war').DataTable({
            "order": [[ 1, "desc" ]]
        });
    } );

</script>

@stop
