@extends('layouts.master')

@section('title', 'Files/Create')

@section('page_heading', 'Files page')

@section('content')

    @include('files.file-nav-buttons')

    <section class="section--center mdl-grid mdl-grid--no-spacing mdl-shadow--2dp">
        <div class="mdl-card mdl-cell mdl-cell--12-col">
            <div class="mdl-card__supporting-text mdl-grid mdl-grid--no-spacing">
                <h4 class="mdl-cell mdl-cell--12-col">Upload</h4>

                <form id="form_create" method="POST" action="{{ route('files') }}" enctype=multipart/form-data>
                    {{ csrf_field() }}

                    <div class="mdl-textfield mdl-js-textfield">
                        <textarea class="mdl-textfield__input" type="text" rows= "4" id="notes" name="notes"></textarea>
                        <label class="mdl-textfield__label" for="notes">Notes...</label>
                    </div>

                    <div>
                        <input type="hidden" name="locked" value="0">
                    </div>

                    <div>
                        <input type="file" id="fileselect" name="uploadedFile" required/>
                    </div>

                    <div id="filedrag">
                        Or drag your file here...
                    </div>

                    <div>
                        <input type="submit">
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
                <a href="#" id="form_submit" class="mdl-button" onclick="document.getElementById('form_create').submit();">
                    Submit
                </a>
            </div>

            <div class="progress">
                <div id="progressbar" class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;">
                    <div id="percent">0%</div>
                </div>
            </div>
        </div>
    </section>

    <!--
    Script for JQuery progress bar
    -->
    <script type="text/javascript">
        $('document').ready(function() {

            $('form').on('submit', function(submitEvent) {
                submitEvent.preventDefault();
                var formData = new FormData($('form')[0]);

                $.ajax({
                    xhr: function() {
                        var reqXhr = new window.XMLHttpRequest();
                        reqXhr.upload.addEventListener('progress', function(progressEvent) {
                            if(progressEvent.lengthComputable) {
                                var percent = Math.round((progressEvent.loaded / progressEvent.total) * 100);
                                $('#progressbar').attr('aria-valuenow', percent).css('width', percent + '%').text(percent + '%');
                            }
                        });
                        return reqXhr;
                    },
                    type: 'POST',
                    url: '{{ route('files') }}',
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function() {
                        window.location.href = "/files"
                    }
                });
            });
        });
    </script>

    <!--
    Drag and drop file script
    -->
    <script type="text/javascript">
        // getElementById
        function $id(id) {
            return document.getElementById(id);
        }

        // output information
        function Output(msg) {
            var m = $id("messages");
            m.innerHTML = msg + m.innerHTML;
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
    </script>

    <style>
        #filedrag {
            display: none;
            font-weight: bold;
            text-align: center;
            padding: 1em 0;
            margin: 1em 0;
            color: #555;
            border: 2px dashed #555;
            border-radius: 7px;
            cursor: default;
        }

        #filedrag.hover {
            color: #f00;
            border-color: #f00;
            border-style: solid;
            box-shadow: inset 0 3px 4px #888;
        }
    </style>
@endsection
