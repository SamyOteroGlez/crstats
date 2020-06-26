@section('css')

    <link rel="stylesheet" href="{{ asset('/css/banner.css') }}">

@stop

<div class="jumbotron jumbotron-fluid">
    <div class="jumbotron-background"></div>

    <div class="container text-center">
        <img src="{{ env('CLAN_BADGE') }}" width="100px" class="rounded float-right" alt="Clan Badge">
        <h2>{{ env('CLAN_NAME') }}</h2>
    </div>

</div>
