@extends('layout_pages')

@section('content_pages')

<div class="card">

    <h5 class="card-header text-white bg-dark">Guerra</h5>

    <div class="card-body">

        <p>
            <h6 class="card-subtitle mb-2 text-muted">
                @if('collectionDay' == $war->state) Dia de colleccion @else Dia de batalla @endif
            </h6>

        </p>

        <p>
            <image src="{{ asset('/images/ui/crown-shield.png') }}" width="50px" title="Score"></image>
            {{ $war->clan->clanScore }}

            <image src="{{ asset('/images/ui/clan-battle-win.png') }}" width="50px" class="ml-4" title="Batallas ganadas"></image>
            {{ $war->clan->wins }}

            <image src="{{ asset('/images/ui/battle.png') }}" width="50px" class="ml-4" title="Batallas jugadas"></image>
            {{ $war->clan->battlesPlayed }}

            <image src="{{ asset('/images/ui/blue-crown.png') }}" width="50px" class="ml-4" title="Coronas"></image>
            {{ $war->clan->crowns }}
        </p>

        <hr/>

        <h5>
            <image src="{{ asset('/images/ui/social.png') }}" width="40px" title="Participantes"></image>
            <b>Participantes:</b> {{ $war->clan->participants }}
        </h5>

        <div class="table-responsive">

            <table id="war" class="table table-hover">

                <thead class="thead-light">
                    <tr>
                        <th scope="col">Nombre</th>
                        <th scope="col">Batallas Ganadas</th>
                        <th scope="col">Batallas Jugadas</th>
                        <th scope="col">Cartas Ganadas</th>
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
                            {{ $player->wins }}
                        </td>
                        <td>
                            <image src="{{ asset('/images/ui/battle.png') }}" width="30px" class="ml-4" title="Batallas jugadas"></image>
                            {{ $player->battlesPlayed}}
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

@stop

@section('scripts')

<script>

    $(document).ready(function() {
        $('#war').DataTable({
            "order": [[ 2, "desc" ]]
        });
    } );

</script>

@stop
