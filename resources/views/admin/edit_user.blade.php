@extends('layouts.admin')

@section('title', 'Admin/Edit/User')

@section('content')
    <h1>Viewing user {{ $user->name }}</h1>

    <!--

    Form for editing user credentials
    Form for updating user password
    Page with form for updating existing user quotation
    Page with form for updating existing user file
    Form for uploading user file
    Form for uploading user quotation
    Form to delete user
    Form to delete user quotation
    Form to delete user file

    -->

    <p><a href="/admin">Back to main page</a></p>

    <h2>User's roles:</h2>

    @if($roles->isNotEmpty())
        <ul>
            @foreach($roles as $role)
                <li>{{ $role->name }}</li>
            @endforeach
        </ul>
    @else
        <p style="font-weight: bold">This user has no roles.</p>
    @endif

    <h2>User's quotations:</h2>

    <p><a href="/admin/user/{{ $user->id }}/quotations/upload">Add quotation to user</a></p>

    @if($quotations->isNotEmpty())
        <table style="width:40%">
            <tr>
                <th>Creation date</th>
                <th>Label</th>
                <th>Original filename</th>
                <th class="td-right">File Type</th>
            </tr>

            @foreach($quotations as $quote)
                <tr>
                    <td>{{ $quote->created_at }}</td>
                    <td><a href="/admin/user/{{ $user->id }}/quotations/{{ $quote->id }}/edit"> {{ $quote->quotationLabel }} </a></td>
                    <td> {{ $quote->originalFilename}} </td>
                    <td class="td-right"> {{ $quote->originalFileMime }} </td>
                </tr>
            @endforeach

            <tr>
                <td class="td-last td-no-left" colspan="4"></td>
            </tr>
        </table>
    @else
        <p style="font-weight: bold">This user has no quotations.</p>
    @endif

    <h2>User's files:</h2>

    <p><a href="/admin/user/{{ $user->id }}/files/upload">Add file to user</a></p>

    @if($files->isNotEmpty())
        <table style="width:60%">
            <tr>
                <th>Creation date</th>
                <th>File name</th>
                <th>Notes</th>
                <th>File size (bytes)</th>
                <th>Is locked?</th>
                <th>Is deliverable?</th>
                <th>Time to destroy</th>
                <th class="td-right">File Type</th>
            </tr>

            @foreach($files as $file)
                <tr>
                    <td> {{ $file->created_at }} </td>
                    <td><a href="/admin/user/{{ $user->id }}/files/{{ $file->id }}/edit"> {{ $file->fileName }} </a></td>
                    <td>{{ $file->notes }}</td>
                    <td>{{ $file->fileSize }}</td>
                    <td>{{ $file->locked }}</td>
                    <td>{{ $file->isDeliverable }}</td>
                    <td>{{ $file->timeToDestroy }}</td>
                    <td class="td-right"> {{ $file->fileMime }} </td>
                </tr>
            @endforeach

            <tr>
                <td class="td-last td-no-left" colspan="8"></td>
            </tr>
        </table>
    @else
        <p style="font-weight: bold">This user has no files.</p>
    @endif


    <style>
        td {
            border-left: 1px solid black;
            text-align: center;
        }

        .td-right {
            border-right: 1px solid black;
        }

        .td-no-left {
            border-left: 0px;
        }

        .td-last {
            border-top: 1px solid black;
        }

        th {
            border-left: 1px solid black;
            border-bottom: 1px solid black;
            border-top: 1px solid black;
            padding-bottom: 5px;
            padding-top: 5px;
        }
    </style>
@endsection