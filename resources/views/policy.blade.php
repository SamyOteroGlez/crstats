@extends('layout_legal')

@section('content_pages')

    <div class="container legal-content text-center">
        <h2 class="display-5 mb-3">
            Privacy Policy
        </h2>
    </div>

    <div class="container">
        <div class="legal-content mt-5">
            <div class="card">
                <div class="card-body">
                    {!! markdown($policy) !!}
                </div>
            </div>
        </div>
    </div>

@stop


