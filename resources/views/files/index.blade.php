@extends('layouts.master')

@section('title', 'Files')

@section('page_heading', 'Files page')

@section('content')
    <ul>
        @foreach($files as $file)
            <li>{{ $file->fileName }}</li>
        @endforeach
    </ul>
@endsection