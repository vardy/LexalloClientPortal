@extends('layouts.admin')

@section('title', 'Admin/Edit/User')

@section('content')

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (session()->has('success-message'))
        <div class="alert alert-success">
            <p>{{ session('success-message') }}</p>
        </div>
    @endif

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

    @if(auth()->user()->hasRole('admin'))
        <div class="panel-section">
            <div class="row">
                <div class="col-lg-12">
                    <h1 id="users_roles">User Roles</h1>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <ul class="list-group">
                        @if($roles->isNotEmpty())
                            @foreach($roles as $role)
                                <li class="list-group-item"><a>{{ $role->name }}</a><button class="btn btn-outline-danger btn-role-remove" onclick="document.getElementById('form-delete-' + '{{ $role->name }}').submit()"><a>Remove</a></button></li>
                            @endforeach
                        @else
                            <li class="list-group-item">This user has no roles</li>
                        @endif
                    </ul>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <h2>Add roles to user</h2>

                    <p>Click on a role to add it to the user</p>

                    <ul class="list-group-horizontal static-role-list">
                        @foreach (\App\Role::all() as $role)
                            <li class="list-group-item static-role-list-item" onclick="document.getElementById('form-' + '{{ $role->name }}').submit()">{{ $role->name }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <form id="form-admin" method="POST" action="/admin/user/{{ $user->id }}/roles" style="display: none">
                {{ csrf_field() }}
                {{ method_field('PATCH') }}

                <input type="checkbox" name="admin_role" value="admin_role" checked>
            </form>

            <form id="form-pm" method="POST" action="/admin/user/{{ $user->id }}/roles" style="display: none">
                {{ csrf_field() }}
                {{ method_field('PATCH') }}

                <input type="checkbox" name="pm_role" value="admin_role" checked>
            </form>

            <form id="form-user" method="POST" action="/admin/user/{{ $user->id }}/roles" style="display: none">
                {{ csrf_field() }}
                {{ method_field('PATCH') }}

                <input type="checkbox" name="user_role" value="admin_role" checked>
            </form>

            <form id="form-delete-admin" method="POST" action="/admin/user/{{ $user->id }}/roles" style="display: none">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}

                <input type="checkbox" name="admin_role" value="admin_role" checked>
            </form>

            <form id="form-delete-pm" method="POST" action="/admin/user/{{ $user->id }}/roles" style="display: none">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}

                <input type="checkbox" name="pm_role" value="admin_role" checked>
            </form>

            <form id="form-delete-user" method="POST" action="/admin/user/{{ $user->id }}/roles" style="display: none">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}

                <input type="checkbox" name="user_role" value="admin_role" checked>
            </form>
        </div>
    @endif

    <div class="panel-section">
        <div class="row">
            <div class="col-lg-12">
                <h1 id="users_quotations">User Quotations</h1>

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
                <h1 id="users_files">User files</h1>

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

    @if(auth()->user()->hasRole('admin'))
        <div class="panel-section">
            <div class="row">
                <div class="col-lg-12">
                    <h1>User Settings</h1>

                    <h2>Update Password</h2>

                    <form id="form-update-password" method="POST" action="/admin/user/{{ $user->id }}/password"> <!-- Patch user's password. Validate password is confirmed. Use two text inputs. -->
                        {{ method_field('PATCH') }}
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="password" class="col-form-label text-md-right">{{ __('Password') }}</label>
                            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                            @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif

                            <label for="password-confirm" class="col-form-label text-md-right">{{ __('Confirm Password') }}</label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                        </div>

                        <div class="form-group">
                            <button class="btn btn-outline-success" onclick="parentNode.parentNode.submit()"><a>Update</a></button>
                        </div>
                    </form>

                    <h2>Delete User</h2>

                    @if(auth()->user()->hasRole('admin'))
                            <form id="form_delete" method="POST" action="/admin/user/{{ $user->id }}" enctype=multipart/form-data>
                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}

                                <button id="btn-delete-user" class="btn btn-outline-danger" onclick="if(confirm('Are you sure you want to delete this user?')){parentNode.submit()}">Delete User</button>
                            </form>
                    @endif
                </div>
            </div>
        </div>
    @endif
@endsection