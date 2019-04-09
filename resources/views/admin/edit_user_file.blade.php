@extends('layouts.admin')

@section('title', 'Admin/Edit/File')

@section('content')
    <div class="panel-section top-section">
        <div class="row">
            <div class="col-lg-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                    <li class="breadcrumb-item"><a href="/admin/user/{{ $user->id }}">{{ $user->name }}</a></li>
                    <li class="breadcrumb-item active">Edit Quotation</li>
                </ol>
            </div>
        </div>
    </div>

    <div class="panel-section">
        <div class="row">
            <div class="col-lg-6">
                <form id="form_edit" method="POST" action="/files/{{ $file->id }}">
                    {{ method_field('PATCH') }}
                    {{ csrf_field() }}

                    <input type="hidden" name="locked" value="0">
                    <input type="hidden" name="isDeliverable" value="0">

                    <fieldset>
                        <div class="form-group">
                            <div>
                                <label for="updateFileName">File name</label>
                                <textarea class="form-control" id="updateFileName" name="updateFileName" rows="3" required>{{ $file->fileName }}</textarea>
                                <small id="labelText" class="form-text text-muted">Max 255 characters.</small>
                            </div>
                        </div>
                    </fieldset>

                    <fieldset class="form-group">
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" id="locked" name="locked" @if($file->locked == 1) checked="checked" @endif value="1">
                                Lock file.
                            </label>
                        </div>

                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" id="isDeliverable" name="isDeliverable" @if($file->isDeliverable == 1) checked="checked" @endif value="1">
                                Is file a deliverable?
                            </label>
                        </div>
                    </fieldset>

                    <fieldset>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Update</button>

                            <button type="button" class="btn btn-danger" onclick="if(confirm('Are you sure you want to delete?')){document.getElementById('delete_form').submit();}">Delete</button>

                            <button type="button" class="btn btn-secondary"><a href="/files/{{ $file->id }}">Download</a></button>
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

    <form id="delete_form" method="POST" action="/files/{{ $file->id }}">
        {{ method_field('DELETE') }}
        {{ csrf_field() }}
    </form>
@endsection
