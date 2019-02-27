@extends('layouts.admin')

@section('title', 'Admin/Edit User')

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
    @if($quotations->isNotEmpty())
        <table style="width:40%">
            <tr>
                <th>Creation Date</th>
                <th>Label</th>
                <th>Original Filename</th>
                <th class="td-right">File Type</th>
            </tr>

            @foreach($quotations as $quote)
                <tr>
                    <td>{{ $quote->created_at }}</td>
                    <td><a href="#"> {{ $quote->quotationLabel }} </a></td>
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
    @if($files->isNotEmpty())
        <table style="width:40%">
            <tr>
                <th>Creation Date</th>
                <th>File Name</th>
                <th class="td-right">File Type</th>
            </tr>

            @foreach($files as $file)
                <tr>
                    <td> {{ $file->created_at }} </td>
                    <td><a href="#"> {{ $file->fileName }} </a></td>
                    <td class="td-right"> {{ $file->mime }} </td>
                </tr>
            @endforeach

            <tr>
                <td class="td-last td-no-left" colspan="3"></td>
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