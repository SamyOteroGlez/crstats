@extends('layout_pages')

@section('content_pages')

<h2 class="mt-4 mb-3">
    {{ trans('html.war.war') }}
</h2>

<h6 class="card-subtitle mb-2 text-muted">
        @if('collectionDay' == $war->state)
            {{ trans('html.war.collection_day') }}
        @else
            {{ trans('html.war.war_day') }}
        @endif
    </h6>

<p>
    <image src="{{ asset('/images/ui/crown-shield.png') }}" width="50px"
        title="{{ trans('html.war.points') }}"></image>
    {{ $war->clan->clanScore }}

    <image src="{{ asset('/images/ui/clan-battle-win.png') }}" width="50px" class="ml-4"
        title="{{ trans('html.war.win_battles') }}"></image>
    {{ $war->clan->wins }}

    <image src="{{ asset('/images/ui/battle.png') }}" width="50px" class="ml-4"
        title="{{ trans('html.war.battles') }}"></image>
    {{ $war->clan->battlesPlayed }}

    <image src="{{ asset('/images/ui/blue-crown.png') }}" width="50px" class="ml-4"
        title="{{ trans('html.war.crowns') }}"></image>
    {{ $war->clan->crowns }}
</p>
<hr/>
<div class="clearfix"></div>

@if ($war->clans)
<h2 class="mt-4 mb-3">{{ trans('html.war.ranking') }}</h2>

<div class="card">

    <h5 class="card-header text-white bg-dark">{{ trans('html.war.clans') }}</h5>

    <div class="card-body">
        <div class="row">
            <table class="table table-hover">

                <thead class="thead-light">
                    <tr>
                        <th scope="col">{{ trans('html.war.clan') }}</th>
                        <th scope="col">trophies</th>
                        <th scope="col">{{ trans('html.war.crowns') }}</th>
                    </tr>
                </thead>

                <tbody>

                    @foreach ($war->clans as $wc)

                    <tr>
                        <td>{{ $wc->name }}</td>
                        <td>
                            <image src="{{ asset('/images/ui/clan-battle-win.png') }}" width="30px"
                                title="{{ trans('html.war.win_battles') }}"></image>
                            {{ $wc->wins }}
                        </td>
                        <td>
                            <image src="{{ asset('/images/ui/blue-crown.png') }}" width="30px"
                                title="{{ trans('html.war.crowns') }}"></image>
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
    {{ trans('html.war.participants') }}
</h2>

<div class="card">

    <h5 class="card-header text-white bg-dark">{{ trans('html.war.members') }}</h5>

    <div class="card-body">
        <div class="row">

            <div class="table-responsive">

                <table id="war" class="table table-hover">

                    <thead class="thead-light">
                        <tr>
                            <th scope="col">{{ trans('html.war.name') }}</th>
                            <th scope="col">{{ trans('html.war.win_battles') }}</th>
                            <th scope="col">{{ trans('html.war.battles') }}</th>
                            <th scope="col">{{ trans('html.war.cards') }}</th>
                        </tr>
                    </thead>

                    <tbody>

                        @foreach ($war->participants as $player)

                        <tr>
                            <td>
                                <a href="{{ route('players', [tagParser($player->tag)]) }}">{{ $player->name }}</a>
                            </td>
                            <td>
                                <image src="{{ asset('/images/ui/clan-battle-win.png') }}" width="30px"
                                    title="{{ trans('html.war.win_battles') }}"></image>
                                {{ $player->wins }} {{ trans('html.war.x_of_y') }} {{ $player->numberOfBattles }}
                            </td>
                            <td>
                                <image src="{{ asset('/images/ui/battle.png') }}" width="30px" class="ml-4"
                                    title="{{ trans('html.war.battles') }}"></image>
                                {{ $player->battlesPlayed }} {{ trans('html.war.x_of_y') }} {{ $player->numberOfBattles }}
                            </td>
                            <td>
                                <image src="{{ asset('/images/ui/deck.png') }}" width="30px" class="ml-4"
                                    title="{{ trans('html.war.cards') }}"></image>
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
