@extends('layouts.main')

@section('title', 'Reach')

@section('sub_css_imports')
@endsection

@section('sub_content')
    <div>
        <div>
            <h1>Hi, {{ auth()->user()->name }}</h1>
        </div>

        <div>
            <form id="form_reach" method="POST" action="{{ route('reach') }}" enctype=multipart/form-data>
                {{ csrf_field() }}

                <div>
                    <textarea>Your message...</textarea>
                </div>
                <div>
                    <input type="submit">
                </div>
            </form>
        </div>
    </div>
@endsection