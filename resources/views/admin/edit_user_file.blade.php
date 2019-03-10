@extends('layouts.admin')

@section('title', 'Admin/Edit/File')

@section('content')
    <p><a href="/admin/user/{{ $user->id }}">Back to editing {{ $user->name }}</a></p>

    <p>Editing file {{ $file->fileName }} for user {{ $user->name }}</p>

    <form id="form_edit" method="POST" action="/files/{{ $file->id }}">
        {{ method_field('PATCH') }}
        {{ csrf_field() }}

        <div>
            <input style="width: 1000px; height: 300px;" type="text" id="notes" name="notes" value="{{ $file->notes }}" required>
        </div>

        <input type="hidden" name="locked" value="0">

        <div>
            <input type="checkbox" id="locked" name="locked" @if($file->locked == 1) checked="checked" @endif value="1">
            <label for="locked">Lock file?</label>
        </div>

        <button type="submit">Update file</button>
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

    <form method="POST" action="/files/{{ $file->id }}">
        {{ method_field('DELETE') }}
        {{ csrf_field() }}

        <a href="#" onclick="if(confirm('Are you sure you want to delete?')){parentNode.submit()}">Delete</a>
    </form>

    <a href="/files/{{ $file->id }}">
        Download
    </a>

    <br>

    <a target="_blank" rel="noopener noreferrer" href="/files/{{ $file->id }}/view">
        View
    </a>
@endsection
