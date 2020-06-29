@extends('layout_home')

@section('content_home')

<p>
    <image src="{{ asset('/images/ui/leaderboard.png') }}" width="30px"
        title="{{ trans('html.home.points') }}"></image>
    <b>{{ trans('html.home.points') }}:</b> {{ $clan->clanScore}}

    <image src="{{ asset('/images/ui/trophy.png') }}" width="30px" class="ml-4"
        title="{{ trans('html.home.required') }}"></image>
    <b>{{ trans('html.home.required') }}:</b> {{ $clan->requiredTrophies }}

    <image src="{{ asset('/images/ui/draft.png') }}" width="30px" class="ml-4"
        title="{{ trans('html.home.donations') }}"></image>
    <b>{{ trans('html.home.donations') }}:</b> {{ $clan->donationsPerWeek}}

    <image src="{{ asset('/images/ui/social.png') }}" width="30px" class="ml-4"
        title="{{ trans('html.home.members') }}"></image>
    <b>{{ trans('html.home.members') }}:</b> {{ $clan->members }}
</p>
<hr/>

@if($current_war)
<h2 class="mt-4 mb-3">{{ trans('html.home.current_war') }}</h2>
    <div class="card">
        <h5 class="card-header text-white bg-dark">
            {{ trans('html.home.ranking') }}
        </h5>

        <div class="card-body table-responsive">

            <table class="table table-hover">

                <thead class="thead-light">
                    <tr>
                        <th scope="col">{{ trans('html.home.clan') }}</th>
                        <th scope="col">{{ trans('html.home.trophies') }}</th>
                        <th scope="col">{{ trans('html.home.crowns') }}</th>
                    </tr>
                </thead>

                <tbody>

                    @foreach ($current_war as $wc)

                    <tr>
                        <td>{{ $wc->name }}</td>
                        <td>
                            <image src="{{ asset('/images/ui/clan-battle-win.png') }}" width="30px"
                                title="{{ trans('html.home.wins') }}"></image>
                            {{ $wc->wins }}
                        </td>
                        <td>
                            <image src="{{ asset('/images/ui/blue-crown.png') }}" width="30px"
                                title="{{ trans('html.home.crowns') }}"></image>
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

<h2 class="mb-3">{{ trans('html.home.ranking') }}</h2>

<div class="table-responsive">

    <div class="card">

        <h5 class="card-header text-white bg-dark">{{ trans('html.home.members') }}</h5>

        <div class="card-body table-responsive">

            <table id="ranking" class="table table-hover">

                <thead class="thead-light">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">{{ trans('html.home.name') }}</th>
                        <th scope="col">{{ trans('html.home.trophies') }}</th>
                        <th scope="col">{{ trans('html.home.lvl') }}</th>
                        <th scope="col">{{ trans('html.home.arena_league') }}</th>
                    </tr>
                </thead>

                <tbody>

                    @foreach ($players->items as $player)

                    <tr>
                        <th scope="row">{{ $player->clanRank }}</th>
                        <td>
                            <a href="{{ route('players', [tagParser($player->tag)]) }}">{{ $player->name }}</a>
                        </td>
                        <td>
                            <image src="{{ asset('/images/ui/trophy.png') }}" width="30px"
                                title="{{ trans('html.home.trophies') }}"></image>
                            {{ $player->trophies }}
                        </td>
                        <td>
                            <image src="{{ asset('/images/levels/' . $player->expLevel . '.png') }}" width="40px"
                                title="{{ trans('html.home.lvl') }}"></image>
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
