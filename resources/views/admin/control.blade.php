<!DOCTYPE html>
@extends('layouts.admin')

@section('title', 'Admin')

@section('content')
    <h1>Admin control panel</h1>

    <!--

    Admin functionality:

    Add quotations to user, upload files for user
    Update quotation details and file details per user
    Delete and add registered users
    View site data and link to telescope

    -->


    <!--

    This page:

    Top: Register users (make registration page admin only, redirect to admin page instead of home page)
    Register with username instead of email.
    List all users and their associated companies in a table
    Add company name to users' table.
    Implement admin page layout template.

    -->

    <p><a href="{{ route('register') }}">Click here to register a new user</a></p>

    <p>Below is a list of all registered users. Click on a username to edit the user or their resources.</p>

    <table style="width:40%">
        <tr>
            <th>Name</th>
            <th>Company</th>
            <th class="td-right">Email Address</th>
        </tr>

        @foreach($users as $user)
            <tr>
                <td><a href="#"> {{ $user->name }} </a></td>
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
