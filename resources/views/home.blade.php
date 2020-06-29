@extends('layout_home')

@section('content_home')

<p>
    <image src="{{ asset('/images/ui/leaderboard.png') }}" width="30px" title="Puntos"></image>
    <b>Puntos:</b> {{ $clan->clanScore}}

    <image src="{{ asset('/images/ui/trophy.png') }}" width="30px" class="ml-4" title="Requeridos"></image>
    <b>Requeridos:</b> {{ $clan->requiredTrophies }}

    <image src="{{ asset('/images/ui/draft.png') }}" width="30px" class="ml-4" title="Donaciones por semana"></image>
    <b>Donaciones por semana:</b> {{ $clan->donationsPerWeek}}

    <image src="{{ asset('/images/ui/social.png') }}" width="30px" class="ml-4" title="Miembros"></image>
    <b>Miembros:</b> {{ $clan->members }}
</p>
<hr/>

@if($current_war)
<h2 class="mt-4 mb-3">Guerra en curso</h2>
    <div class="card">
        <h5 class="card-header text-white bg-dark">
            Ranking
        </h5>

        <div class="card-body table-responsive">

            <table class="table table-hover">

                <thead class="thead-light">
                    <tr>
                        <th scope="col">Clan</th>
                        <th scope="col">Trofeos</th>
                        <th scope="col">Coronas</th>
                    </tr>
                </thead>

                <tbody>

                    @foreach ($current_war as $wc)

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

<hr/>
@endif

<h2 class="mb-3">Ranking</h2>

<div class="table-responsive">

    <div class="card">

        <h5 class="card-header text-white bg-dark">Miembros</h5>

        <div class="card-body table-responsive">

            <table id="ranking" class="table table-hover">

                <thead class="thead-light">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Trofeos</th>
                        <th scope="col">Nivel</th>
                        <th scope="col">Arena/Liga</th>
                    </tr>
                </thead>

                <tbody>

                    @foreach ($players->items as $player)

                    <tr>
                        <th scope="row">{{ $player->clanRank }}</th>
                        <td>
                            <a href="{{ route('players', [playerTagParser($player->tag)]) }}">{{ $player->name }}</a>
                        </td>
                        <td>
                            <image src="{{ asset('/images/ui/trophy.png') }}" width="30px" title="Trofeos"></image>
                            {{ $player->trophies }}
                        </td>
                        <td>
                            <image src="{{ asset('/images/levels/' . $player->expLevel . '.png') }}" width="40px" title="Nivel"></image>
                            <span style="font-size: 0;">{{ $player->expLevel }}</span>
                        </td>
                        <td>{{ $player->arena->name }}</td>
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
        $('#ranking').DataTable();

        $('#clan-international').DataTable({
            'searching': false
        });

        $('#clan-local').DataTable({
            'searching': false
        });
    });

</script>

@stop
