@extends('layouts.main')

@section('title', 'Request Quotation')

@section('sub_css_imports')
    <link rel="stylesheet" href="{{ mix('/css/quotations.css') }}" type="text/css">
@endsection

@section('quotations_btn_style', 'color: rgb(0, 174, 199);')

@section('sub_content')
    @include('quotations.quote-nav-buttons', ['current' => 'request'])

    <div class="request-form-container">
        <form method="get" action="/send/quote_request/{{ auth()->user()->id }}" enctype=multipart/form-data>
            {{ csrf_field() }}

            <div class="form-group">
                <label class="block-label" for="source_language">Source language</label>
                <textarea class="form-text-area" name="source_language" id="source_language" rows="1" required></textarea>

                <label class="block-label" for="target_language">Target language</label>
                <textarea class="form-text-area" name="target_language" id="target_language" rows="1" required></textarea>
            </div>

            <div class="form-group">
                <label class="block-label" for="other_comments">Other Instructions/Comments</label>
                <textarea class="form-text-area" name="other_comments" id="other_comments" rows="4" required></textarea>
            </div>

            <div class="form-group">
                <label class="block-label" for="delivery_date">Delivery Date/Time (Please specify timezone)</label>
                <textarea class="form-text-area" name="delivery_date" id="delivery_date" rows="1" required></textarea>
            </div>

            <div class="form-group">
                <a href="#" class="submit-button" onclick="parentNode.parentNode.submit()">Submit Request</a>
            </div>
        </form>
    </div>
@endsection