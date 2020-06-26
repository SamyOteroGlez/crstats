@section('css')

    <link rel="stylesheet" href="{{ asset('/css/jumbotron.css') }}">

@stop

<div class="jumbotron jumbotron-fluid">
    <div class="jumbotron-background"></div>

    <div class="container text-white">
        <img src="{{ env('CLAN_BADGE') }}" width="100px" class="rounded float-right" alt="Clan Badge">
        <h1 class="display-4">{{ $clan->name }}</h1>
        <p class="lead">{{ $clan->description }}</p>
        <hr class="my-4">
        <p>
            <b>Score:</b> {{ $clan->clanScore}} -
            <b>Requeridos:</b> {{ $clan->requiredTrophies }} -
            <b>Donaciones por semana:</b> {{ $clan->donationsPerWeek}} -
            <b>Miembros:</b> {{ $clan->members }}
        </p>
        <a class="btn btn-outline-secondary" href="{{ route('ranking') }}">Ranking</a>
    </div>
</div>
