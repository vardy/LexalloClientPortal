@extends('layouts.admin')

@section('title', 'Admin/Edit/User')

@section('content')

    <div class="panel-section top-section">
        <div class="row">
            <div class="col-lg-12">
                <h1>Viewing User: <span class="viewing-user-name-heading">{{ $user->name }}</span></h1>

                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                    <li class="breadcrumb-item active">{{ $user->name }}</li>
                </ol>
            </div>
        </div>
    </div>

    <div class="panel-section">
        <div class="row">
            <div class="col-lg-12">
                <h1>User's Roles</h1>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <ul class="list-group">
                    @if($roles->isNotEmpty())
                        @foreach($roles as $role)
                            <li class="list-group-item">{{ $role->name }}</li>
                        @endforeach
                    @else
                        <li class="list-group-item">This user has no roles</li>
                    @endif
                </ul>
            </div>
        </div>
    </div>

    <div class="panel-section">
        <div class="row">
            <div class="col-lg-12">
                <h1>User's Quotations</h1>

                <p><a href="/admin/user/{{ $user->id }}/quotations/upload">Add quotation to user</a></p>

                <table class="table dataTable">
                    <thead>
                        <tr>
                            <th scope="col">Creation date</th>
                            <th scope="col">Label</th>
                            <th scope="col">Original filename</th>
                            <th scope="col">File Type</th>
                        </tr>
                    </thead>
                    <tbody>
                    @if($quotations->isNotEmpty())
                        @foreach($quotations as $quote)
                            <tr class="table-active">
                                <td>{{ $quote->created_at }}</td>
                                <td><a href="/admin/user/{{ $user->id }}/quotations/{{ $quote->id }}/edit"> {{ $quote->quotationLabel }} </a></td>
                                <td> {{ $quote->originalFilename}} </td>
                                <td> {{ $quote->originalFileMime }} </td>
                            </tr>
                        @endforeach
                    @else
                        <tr class="table-active">
                            <td>No quotations...</td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="panel-section">
        <div class="row">
            <div class="col-lg-12">
                <h1>User's files:</h1>

                <p><a href="/admin/user/{{ $user->id }}/files/upload">Add file to user</a></p>

                <table class="table dataTable">
                    <thead>
                        <tr>
                            <th scope="col">Creation date</th>
                            <th scope="col">File name</th>
                            <th scope="col">File size (bytes)</th>
                            <th scope="col">Is locked?</th>
                            <th scope="col">Is deliverable?</th>
                            <th scope="col">Time of deletion</th>
                            <th scope="col">File Type</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($files->isNotEmpty())
                            @foreach($files as $file)
                                <tr class="table-active">
                                    <td> {{ $file->created_at }} </td>
                                    <td><a href="/admin/user/{{ $user->id }}/files/{{ $file->id }}/edit"> {{ $file->fileName }} </a></td>
                                    <td>{{ $file->fileSize }}</td>
                                    <td>{{ $file->locked }}</td>
                                    <td>{{ $file->isDeliverable }}</td>
                                    <td>{{ $file->timeToDestroy }}</td>
                                    <td> {{ $file->fileMime }} </td>
                                </tr>
                            @endforeach
                        @else
                            <tr class="table-active">
                                <td>No files...</td>
                                <td>
                                <td>
                                <td>
                                <td>
                                <td>
                                <td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection