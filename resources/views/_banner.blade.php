@section('css')

    <link rel="stylesheet" href="{{ asset('/css/banner.css') }}">

@stop

<div class="jumbotron jumbotron-fluid">
    <div class="jumbotron-background"></div>

    <div class="container text-center">
        <h2 class="display-5">
            @if(session('CR.CLAN'))
                {{ session('CR.CR_CLAN_NAME') }}
            @elseif(session('CR.PLAYER'))
                Clash Royale
            @endif
        </h2>
    </div>

</div>
