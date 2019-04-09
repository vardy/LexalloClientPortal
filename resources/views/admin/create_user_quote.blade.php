@extends('layouts.admin')

@section('title', 'Admin/Create/Quote')

@section('content')

    <div class="panel-section top-section">
        <div class="row">
            <div class="col-lg-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                    <li class="breadcrumb-item"><a href="/admin/user/{{ $user->id }}#users_quotations">{{ $user->name }}</a></li>
                    <li class="breadcrumb-item active">New Quotation</li>
                </ol>
            </div>
        </div>
    </div>

    <div class="panel-section top-section">
        <div class="row">
            <div class="col-lg-6">
                <form method="POST" action="{{ route('quotations') }}" enctype="multipart/form-data">
                    {{ csrf_field() }}

                    <fieldset>
                        <legend>File upload</legend>

                        <div class="form-group">
                            <input type="file" class="form-control-file" name="uploadedFile" id="file_upload" aria-describedby="fileHelp" required>
                            <small id="fileHelp" class="form-text text-muted">You may <i>not</i> upload multiple files at a time.</small>
                        </div>
                    </fieldset>

                    <fieldset class="form-group">
                        <legend>Other</legend>

                        <div>
                            <label for="quoteLabel">Quotation label</label>
                            <textarea class="form-control" id="quoteLabel" name="quoteLabel" rows="3" required></textarea>
                            <small id="labelHelp" class="form-text text-muted">Max 255 characters.</small>
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

