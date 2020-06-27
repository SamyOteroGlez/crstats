@extends('layout_pages')

@section('content_pages')

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

                        @foreach ($players as $player)

                        <tr>
                            <th scope="row">{{ $player['clanRank'] }}</th>
                            <td>
                                <a href="{{ route('players', [playerTagParser($player['tag'])]) }}">{{ $player['name'] }}</a>
                            </td>
                            <td>
                                <image src="{{ asset('/images/ui/trophy.png') }}" width="30px" title="Trofeos"></image>
                                {{ $player['trophies'] }}
                            </td>
                            <td>
                                <image src="{{ asset('/images/levels/' . $player['expLevel'] . '.png') }}" width="40px" title="Nivel"></image>
                                <span style="font-size: 0;">{{ $player['expLevel'] }}</span>
                            </td>
                            <td>{{ $player['arena']['name'] }}</td>
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
