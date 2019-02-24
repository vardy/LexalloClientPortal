@extends('layouts.master')

@section('title', 'Quotations/Upload')

@section('page_heading', 'Quotations')

@section('content')
    <section class="section--center mdl-grid mdl-grid--no-spacing mdl-shadow--2dp">
        <div class="mdl-card mdl-cell mdl-cell--12-col">
            <div class="mdl-card__supporting-text mdl-grid mdl-grid--no-spacing">
                <h4 class="mdl-cell mdl-cell--12-col">Upload</h4>

                <form id="form_create" method="POST" action="{{ route('quotations') }}" enctype="multipart/form-data">
                    {{ csrf_field() }}

                    <div class="mdl-textfield mdl-js-textfield">
                        <input class="mdl-textfield__input" type="text" id="quoteLabel" name="quoteLabel">
                        <label class="mdl-textfield__label" for="quoteLabel">Label</label>
                    </div>

                    <div>
                        <input type="file" name="uploadedFile" />
                    </div>
                </form>
            </div>

            <div class="mdl-card__actions">
                <a href="#" class="mdl-button" onclick="document.getElementById('form_create').submit();">
                    Submit
                </a>
            </div>

        </div>
    </section>
@endsection