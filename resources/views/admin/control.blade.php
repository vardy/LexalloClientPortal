@extends('layouts.admin')

@section('title', 'Admin')

@section('content')
    <h1>Admin control panel</h1>

    <!--

    View site data and link to telescope

    -->
    <p><a href="{{ route('register') }}">Click here to register a new user</a></p>

    <h2>
        Users
    </h2>

    <p>Below is a list of all registered users. Click on a username to edit the user or their resources.</p>

    <table style="width:40%">
        <tr>
            <th>Name</th>
            <th>Company</th>
            <th class="td-right">Email Address</th>
        </tr>

        @foreach($users as $user)
            <tr>
                <td><a href="/admin/user/{{ $user->id }}"> {{ $user->name }} </a></td>
                <td> {{ $user->company }} </td>
                <td class="td-right"> {{ $user->email }} </td>
            </tr>
        @endforeach

        <tr>
            <td class="td-last td-no-left" colspan="3"></td>
        </tr>
    </table>

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
