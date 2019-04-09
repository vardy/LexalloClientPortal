@extends('layouts.admin')

@section('title', 'Admin')

@section('content')

    <div class="panel-section top-section">
        <h1>Home</h1>

        <ol class="breadcrumb">
            <li class="breadcrumb-item">Admin Panel</li>
            <li class="breadcrumb-item">Home</li>
        </ol>
    </div>

    <div class="panel-section">
        <h1>Register users</h1>

        <button type="button" class="btn btn-link"><a href="{{ route('register') }}">Register a new user.</a></button>
    </div>

    <div class="panel-section">
        <div class="row">
            <div class="col-lg-12">
                <h1>
                    Users
                </h1>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <p>Below is a list of all registered users. Click on a username to edit the user or their resources.</p>

                <table class="table dataTable">
                    <thead>
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Company</th>
                            <th scope="col">Email Address</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                            <tr class="table-active">
                                <th scope="row"><a href="/admin/user/{{ $user->id }}"> {{ $user->name }} </a></th>
                                <td> {{ $user->company }} </td>
                                <td> {{ $user->email }} </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
