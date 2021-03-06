@extends('layout_pages')

@section('content_pages')

<h2 class="mt-4 mb-3">
    {{ trans('html.other.rankings') }}
</h2>

<div class="row">

    <div class="col-lg-6">

        <div class="card">
            <h5 class="card-header text-white bg-dark">
                {{ trans('html.other.world') }}
            </h5>

            <div class="card-body table-responsive">

                <h6 class="card-subtitle mb-2 text-muted">{{ trans('html.other.top') }}</h6>
                <hr/>

                <table id="clan-international" class="table table-hover">

                    <thead class="thead-light">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">{{ trans('html.other.clan') }}</th>
                            <th scope="col">{{ trans('html.other.trophies') }}</th>
                        </tr>
                    </thead>

                    <tbody>

                        @foreach ($clan_international->items as $cr)

                        <tr>
                            <th scope="row">{{ $cr->rank }}</th>
                            <td>{{ $cr->name }}</td>
                            <td>{{ $cr->clanScore }} </td>
                        </tr>

                        @endforeach

                        </tr>

                    </tbody>

                </table>

            </div>

        </div>

    </div>

    <div class="col-lg-6">

        <div class="card">
            <h5 class="card-header text-white bg-dark">
                {{ trans('html.other.local') }}
            </h5>

            <div class="card-body table-responsive">

                <h6 class="card-subtitle mb-2 text-muted">{{ trans('html.other.top') }}</h6>
                <hr/>

                <table id="clan-local" class="table table-hover">

                    <thead class="thead-light">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">{{ trans('html.other.clan') }}</th>
                            <th scope="col">{{ trans('html.other.trophies') }}</th>
                        </tr>
                    </thead>

                    <tbody>

                        @foreach ($clan_local->items as $cr)

                        <tr>
                            <th scope="row">{{ $cr->rank }}</th>
                            <td>{{ $cr->name }}</td>
                            <td>{{ $cr->clanScore }} </td>
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

        $('#clan-international').DataTable({
            'searching': false
        });

        $('#clan-local').DataTable({
            'searching': false
        });
    });

</script>

@stop
