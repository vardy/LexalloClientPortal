@extends('layouts.main')

@section('title', 'Files/Edit')

@section('sub_css_imports')
    <link rel="stylesheet" href="{{ mix('/css/files.css') }}" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
@endsection

@section('sub_content')
    @include('files.file-nav-buttons')

    <div class="edit-card-container">
        <div class="card">

            <form id="form_edit" method="POST" action="/files/{{ $file->id }}">
                {{ method_field('PATCH') }}
                {{ csrf_field() }}

                <div>
                    <input type="hidden" name="locked" value="{{ $file->locked }}">
                </div>

                <div>
                    <label for="notes">Notes...</label>
                    <textarea type="text" rows= "4" id="notes" name="notes">{{ $file->notes }}</textarea>
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

            <a href="#" class="submit-button" onclick="document.getElementById('form_edit').submit();">
                Submit
            </a>

        </div>
    </div>
@endsection
