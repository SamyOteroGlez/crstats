@section('css')

    <link rel="stylesheet" href="{{ asset('/css/jumbotron.css') }}">

@stop

<div class="jumbotron jumbotron-fluid">
    <div class="jumbotron-background"></div>

    <div class="container text-white">
        <h1 class="display-5 mb-5">{{ $clan->name }}</h1>
        <p class="lead">{{ $clan->description }}</p>
        <hr class="my-4">

        <a class="btn btn-outline-secondary" href="{{ route('clan.war') }}">Guerra</a>
    </div>
</div>
