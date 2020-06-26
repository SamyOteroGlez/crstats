@extends('layout')

@section('header')

    @include('_banner')

@stop

@section('content')

    <div class="table-responsive">

        <div class="card">

            <h5 class="card-header text-white bg-dark">Ranking</h5>

            <div class="card-body">

                <table id="ranking" class="table table-hover">

                    <thead class="thead-light">
                        <tr>
                            <th scope="col">Ranking</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Trofeos</th>
                            <th scope="col">Level</th>
                            <th scope="col">Role</th>
                            <th scope="col">Arena</th>
                            <th scope="col">Tag</th>
                            <th scope="col">Nonaciones</th>
                        </tr>
                    </thead>

                    <tbody>

                        @foreach ($players as $player)

                        <tr>
                            <th scope="row">{{ $player['clanRank'] }}</th>
                            <td>
                                <a href="{{ route('players', [playerTagParser($player['tag'])]) }}">{{ $player['name'] }}</a>
                            </td>
                            <td>{{ $player['trophies'] }}</td>
                            <td>{{ $player['expLevel'] }}</td>
                            <td>{{ $player['role'] }}</td>
                            <td>{{ $player['arena']['name'] }}</td>
                            <td>{{ $player['tag'] }}</td>
                            <td>{{ $player['donations'] }}</td>
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
    } );

</script>

@stop
