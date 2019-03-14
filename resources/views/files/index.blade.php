@extends('layouts.main')

@section('title', 'Files')

@section('page_heading', 'Files page')

@section('content')

    <div class="mdl-grid">
        <div class="mdl-cell mdl-cell--8-col">
            <div>
                <a href="/files/upload">Upload a file.</a>
            </div>
        </div>
    </div>

    <ul>
        @foreach($files as $file)
            <li style="margin-bottom: 15px">
                {{ $file->fileName }}<br>
                <form method="POST" action="/files/{{ $file->id }}">
                    {{ method_field('DELETE') }}
                    {{ csrf_field() }}

                    <a href="#" onclick="if(confirm('Are you sure you want to delete?')){parentNode.submit()}">Delete</a>
                </form>
                <a href="/files/{{ $file->id }}/edit">
                    Edit
                </a><br>
                <a href="/files/{{ $file->id }}">
                    Download
                </a><br>
                <a target="_blank" rel="noopener noreferrer" href="/files/{{ $file->id }}/view">
                    View
                </a>
            </li>
        @endforeach
    </ul>
@endsection