@extends('layout_pages')

@section('content_pages')

<h2 class="mt-4 mb-3">Stats</h2>

<div class="row">

    <div class="col-lg-12">

        <div class="card">
            <h5 class="card-header text-white bg-dark">
                % Victorias / % Derrotas
            </h5>

            <div class="card-body">

                <div class="row">

                    <div class="col-md-6">
                        <canvas id="wins" width="200" height="200"></canvas>
                    </div>

                    <div class="col-md-6">
                        <canvas id="losses" width="200" height="200"></canvas>
                    </div>

                </div>

            </div>

        </div>

    </div>

</div>
<hr/>
<div class="clearfix"></div>

<h2 class="mt-4 mb-3">Ranking</h2>

<div class="row">

    <div class="col-lg-12">

        <div class="card">
            <h5 class="card-header text-white bg-dark">
                % Victorias
            </h5>

            <div class="card-body table-responsive">

                <table id="stats" class="table table-hover">

                    <thead class="thead-light">
                        <tr>
                            <th scope="col">% victorias</th>
                            <th scope="col">% derrotas</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Trofeos</th>
                            <th scope="col">#</th>
                        </tr>
                    </thead>

                    <tbody>

                        @foreach ($players->items as $player)

                        <tr>
                            <td>{{ $player->win_percent }} </td>
                            <td>{{ $player->losses_percent }} </td>
                            <td>
                                <a href="{{ route('players', [tagParser($player->tag)]) }}">{{ $player->name }}</a>
                            </td>
                            <td>
                                <image src="{{ asset('/images/ui/trophy.png') }}" width="30px" title="Trofeos"></image>
                                {{ $player->trophies }}
                            </td>
                            <td>{{ $player->clanRank }}</td>
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

    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js"
            integrity="sha256-R4pqcOYV8lt7snxMQO/HSbVCFRPMdrhAFMH+vr9giYI="
            crossorigin="anonymous"></script>

    <script>

        $(document).ready(function() {

            $('#stats').DataTable({
                "order": [[ 0, "desc" ]]
            });

            var wins = document.getElementById('wins').getContext('2d');
            var wins_chart = new Chart(wins, {
                type: 'line',
                data: {
                    labels: {{ json_encode($players->graphs_x_win_losses_percent) }},
                    datasets: [{
                        label: 'Ranking / Victorias %',
                        data: {{ json_encode($players->graphs_y_win_percent) }},
                        backgroundColor:'rgba(75, 192, 192, 0.2)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                    }],
                },
                options: {
                    scales: {
                        xAxes: [{
                            display: true,
                            scaleLabel: {
                                display: true,
                                labelString: 'Ranking'
                            }
                        }],
                        yAxes: [{
                            display: true,
                            ticks: {
                                beginAtZero: true,
                                steps: 10,
                                stepValue: 5,
                                max: 100
                            },
                            scaleLabel: {
                                display: true,
                                labelString: '% Victorias'
                            }
                        }]
                    }
                }
            });

            var losses = document.getElementById('losses').getContext('2d');
            var losses_chart = new Chart(losses, {
                type: 'line',
                data: {
                    labels: {{ json_encode($players->graphs_x_win_losses_percent) }},
                    datasets: [{
                        label: 'Ranking / Derrotas %',
                        data: {{ json_encode($players->graphs_y_losses_percent) }},
                        backgroundColor:'rgba(255, 99, 132, 0.2)',
                        borderColor: 'rgba(255, 99, 132, 1)',
                    }],
                },
                options: {
                    scales: {
                        xAxes: [{
                            display: true,
                            scaleLabel: {
                                display: true,
                                labelString: 'Ranking'
                            }
                        }],
                        yAxes: [{
                            display: true,
                            ticks: {
                                beginAtZero: true,
                                steps: 10,
                                stepValue: 5,
                                max: 100
                            },
                            scaleLabel: {
                                display: true,
                                labelString: '% Derrotas'
                            }
                        }]
                    }
                }
            });

        });

    </script>

@stop
