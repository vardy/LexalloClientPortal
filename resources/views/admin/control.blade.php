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

    <h2>
        Reach messages
    </h2>

    <table>
        <tr>
            <th>Name</th>
            <th>Company</th>
            <th class="td-right">View Message</th>
            <th>Date/Time Submitted</th>
            <th>Resolve (delete)</th>
        </tr>

        @foreach($messages as $message)
            <form id="form-delete-message-{{ $message->id }}" method="POST" action="/admin/message/{{ $message->id }}">
                {{ method_field('DELETE') }}
                {{ csrf_field() }}
            </form>

            <tr>
                <td>{{ $userObj::find($message->user_id)->name }}</td>
                <td>{{ $userObj::find($message->user_id)->company }}</td>
                <td><a href="/admin/message/{{ $message->id }}/view">Click</a></td>
                <td>{{ $message->created_at }}</td>
                <td><a href="#" onclick="if(confirm('Are you sure you want to delete?')){document.getElementById('form-delete-message-{{ $message->id }}').submit()}">Click</a></td>
            </tr>
        @endforeach
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
