@extends('layouts.home')

@section('title', 'Landing')

@section('css_imports')
    <link rel="stylesheet" href="{{ mix('/css/app.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ mix('/css/landing.css') }}" type="text/css">
@endsection

@section('nav_content')
@endsection

@section('body_classes')
    body-container full-height-grow
@endsection

@section('sub_content')
    <div class="grid-parent">
        <div class="grid-child">
            <div class="card">
                <a href="{{ route('files') }}">
                    <img alt="uploads-link" class="card-image" src="{{ asset('images/uploads_card.jpeg') }}">
                    <div class="card-text">
                        <h4><b>Uploads</b></h4>
                        <p>Upload files for us to work on and receive deliverables here.</p>
                    </div>
                </a>
            </div>
        </div>

        <div class="grid-child">
            <div class="card">
                <a href="{{ route('quotations') }}">
                    <img alt="quotations-link" class="card-image" src="{{ asset('images/quotations_card.jpeg') }}">
                    <div class="card-text">
                        <h4><b>Quotations</b></h4>
                        <p>Where you find your quotations till date.</p>
                    </div>
                </a>
            </div>
        </div>

        <div class="grid-child">
            <div class="card">
                <a href="{{ route('quotations') }}">
                    <img alt="request-quote-link" class="card-image" src="{{ asset('images/request_card.jpeg') }}">
                    <div class="card-text">
                        <h4><b>Request New Quote</b></h4>
                        <p>Starting a new project? We'd love to be a part of it!</p>
                    </div>
                </a>
            </div>
        </div>

        <div class="grid-child">
            <div class="card">
                <a href="mailto:coo@lexallo.com?subject=Message To Our COO">
                    <img alt="reach-ceo-link" class="card-image" src="{{ asset('images/reach_card.jpeg') }}">
                    <div class="card-text">
                        <h4><b>Reach</b></h4>
                        <p>Drop a note to our COO.</p>
                    </div>
                </a>
            </div>
        </div>
    </div>
@endsection
