@extends('layouts.main')

@section('title', 'Files/Create')

@section('sub_css_imports')
    <link rel="stylesheet" href="{{ mix('/css/files.css') }}" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.js"></script>
@endsection

@section('sub_content')

    @include('files.file-nav-buttons')

    <div class="upload-file-container">
        <div class="card">
            <form id="form_create" method="POST" action="{{ route('files') }}" enctype=multipart/form-data>
                {{ csrf_field() }}

                <div>
                    <input type="hidden" name="locked" value="0">
                </div>

                <div>
                    <input type="file" id="fileselect" name="uploadedFile" required/>
                </div>

                <div id="filedrag">
                    <div class="filedrag-text">
                        <p>Or drag your file here...</p>
                    </div>
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

            <div>
                <a href="#" class="submit-button" id="form_submit" onclick="doSubmit();">
                    Submit
                </a>
            </div>

            <div id="upload-area" class="upload-area" style="display: none">
                <div class="progress">
                    <div class="bar"></div>
                </div>
                <span class="upload-text">Your file is being uploaded... This may take a while! Do not close this page.</span>
            </div>
        </div>
    </div>

    <!--
    Drag and drop file script
    -->
    <script type="text/javascript">

        function doSubmit() {
            document.getElementById('upload-area').style.display = 'block';
            document.getElementById('form_create').submit();
        }

        $(document).ready(function() {
            // getElementById
            function $id(id) {
                return document.getElementById(id);
            }

            // call initialization file
            if (window.File && window.FileList && window.FileReader) {
                Init();
            }

            // initialize
            function Init() {

                var fileselect = $id("fileselect"),
                    filedrag = $id("filedrag");

                // file select
                fileselect.addEventListener("change", FileSelectHandler, false);

                // is XHR2 available?
                var xhr = new XMLHttpRequest();

                if (xhr.upload) {
                    // file drop
                    filedrag.addEventListener("dragover", FileDragHover, false);
                    filedrag.addEventListener("dragleave", FileDragHover, false);
                    filedrag.addEventListener("drop", FileSelectHandler, false);
                    filedrag.style.display = "block";
                }
            }

            // file drag hover
            function FileDragHover(e) {
                e.stopPropagation();
                e.preventDefault();
                e.target.className = (e.type == "dragover" ? "hover" : "");
            }

            // file selection
            function FileSelectHandler(e) {
                // cancel event and hover styling
                FileDragHover(e);
                fileselect.files = e.dataTransfer.files;
                evt.preventDefault();
            }
        });
    </script>
@endsection
