@extends('layouts.admin')

@section('title', 'Admin/Edit/Quote')

@section('content')

    <div class="panel-section top-section">
        <div class="row">
            <div class="col-lg-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                    <li class="breadcrumb-item"><a href="/admin/user/{{ $user->id }}#users_quotations">{{ $user->name }}</a></li>
                    <li class="breadcrumb-item active">Edit Quotation</li>
                </ol>
            </div>
        </div>
    </div>

    <div class="panel-section">
        <div class="row">
            <div class="col-lg-6">
                <form id="form_edit" method="POST" action="/quotations/{{ $quote->id }}">
                    {{ method_field('PATCH') }}
                    {{ csrf_field() }}

                    <fieldset>
                        <div class="form-group">
                            <label for="quotationLabel">File name</label>
                            <textarea class="form-control" id="quotationLabel" name="quotationLabel" rows="3" required>{{ $quote->quotationLabel }}</textarea>
                            <small id="labelText" class="form-text text-muted">Max 255 characters.</small>
                        </div>

                        <button type="submit" class="btn btn-primary">Update</button>

                        <button type="button" class="btn btn-danger" onclick="if(confirm('Are you sure you want to delete?')){document.getElementById('delete_form').submit();}">Delete</button>

                        <button type="button" class="btn btn-secondary"><a href="/quotations/{{ $quote->id }}">Download</a></button>
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

    <form id="delete_form" method="POST" action="/quotations/{{ $quote->id }}">
        {{ method_field('DELETE') }}
        {{ csrf_field() }}
    </form>
@endsection