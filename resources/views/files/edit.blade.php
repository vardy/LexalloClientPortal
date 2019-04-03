@extends('layouts.main')

@section('title', 'Files/Edit')

@section('sub_css_imports')
    <link rel="stylesheet" href="{{ mix('/css/files.css') }}" type="text/css">
@endsection

@section('uploads_btn_style', 'text-decoration: underline; font-weight: bold;')

@section('sub_content')

    @include('files.file-nav-buttons')

    <div class="upload-file-container">
        <div class="card">
            <h4>Editing: {{ $file->fileName }}</h4>

            <form id="form_edit" method="POST" action="/files/{{ $file->id }}">
                {{ csrf_field() }}
                {{ method_field('PATCH') }}

                <input type="hidden" name="locked" value="{{ $file->locked }}">
                <input type="hidden" name="isDeliverable" value="{{ $file->isDeliverable }}">

                <div>
                    <label id="edit_filename_label" for="updateFileName">Update file name</label>
                    <input type="text" id="updateFileName" name="updateFileName" value="{{ $file->fileName }}">
                </div>

                @if($errors->any())
                    <div>
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div id="edit_form_submit">
                    <a href="#" class="submit-button" id="form_submit" onclick="document.getElementById('form_edit').submit();">
                        Submit
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection