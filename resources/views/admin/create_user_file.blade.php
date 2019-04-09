@extends('layouts.admin')

@section('title', 'Admin/Create/File')

@section('content')

    <div class="panel-section top-section">
        <div class="row">
            <div class="col-lg-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                    <li class="breadcrumb-item"><a href="/admin/user/{{ $user->id }}">{{ $user->name }}</a></li>
                    <li class="breadcrumb-item active">New File</li>
                </ol>
            </div>
        </div>
    </div>

    <div class="panel-section">
        <div class="row">
            <div class="col-lg-12">
                <form method="POST" action="{{ route('files') }}" enctype="multipart/form-data">
                    {{ csrf_field() }}

                    <fieldset>
                        <legend>File upload</legend>

                        <div class="form-group">
                            <input type="file" class="form-control-file" name="uploadedFiles[]" id="uploadedFiles" aria-describedby="fileHelp" required>
                            <small id="fileHelp" class="form-text text-muted">You may upload multiple files at a time.</small>
                        </div>
                    </fieldset>

                    <fieldset class="form-group">
                        <legend>File options</legend>

                        <input type="hidden" name="locked" value="0">
                        <input type="hidden" name="isDeliverable" value="0">

                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" name="locked" id="locked" value="1">
                                Lock file.
                            </label>
                        </div>

                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" name="isDeliverable" id="isDeliverable" value="1">
                                Is file a deliverable?
                            </label>
                        </div>
                    </fieldset>

                    <fieldset>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </fieldset>
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
        </div>
    </div>
@endsection