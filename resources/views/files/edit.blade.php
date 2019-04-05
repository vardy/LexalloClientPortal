@extends('layouts.main')

@section('title', 'Files/Edit')

@section('sub_css_imports')
    <link rel="stylesheet" href="{{ mix('/css/files.css') }}" type="text/css">
@endsection

@section('uploads_btn_style', 'text-decoration: underline; font-weight: bold;')

@section('sub_content')

    @include('files.file-nav-buttons', ['current' => 'index'])

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

                <div id="edit_form_controls">
                    <a href="#" class="submit-button" id="form_submit" onclick="document.getElementById('form_edit').submit();">
                        Rename
                    </a>

                    <a id="delete_button" href="#" class="submit-button" id="form_submit" onclick="if(confirm('Are you sure you want to delete this file?')){document.getElementById('delete_file_form').submit();}">
                        Delete
                    </a>

                    <a href="/files" class="submit-button" id="form_back">
                        Cancel
                    </a>
                </div>
            </form>

            <form method="POST" action="/files/{{ $file->id }}" id="delete_file_form">
                {{ method_field('DELETE') }}
                {{ csrf_field() }}
            </form>
        </div>
    </div>
@endsection