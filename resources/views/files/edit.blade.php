@extends('layouts.master')

@section('title', 'Files/Edit')

@section('page_heading', 'Files page')

@section('content')
    @include('files.file-nav-buttons')

    <section class="section--center mdl-grid mdl-grid--no-spacing mdl-shadow--2dp">
        <div class="mdl-card mdl-cell mdl-cell--12-col">
            <div class="mdl-card__supporting-text mdl-grid mdl-grid--no-spacing">
                <h4 class="mdl-cell mdl-cell--12-col">Editing: {{ $file->id }}</h4>

                <form id="form_edit" method="POST" action="/files/{{ $file->id }}">
                    {{ method_field('PATCH') }}
                    {{ csrf_field() }}

                    <div class="mdl-textfield mdl-js-textfield">
                        <textarea class="mdl-textfield__input" type="text" rows= "4" id="notes" name="notes">{{ $file->notes }}</textarea>
                        <label class="mdl-textfield__label" for="notes">Notes...</label>
                    </div>
                </form>

                @if($errors->any())
                    <div>
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>

            <div class="mdl-card__actions">
                <a href="#" class="mdl-button" onclick="document.getElementById('form_edit').submit();">
                    Submit
                </a>
            </div>

        </div>
    </section>
@endsection
