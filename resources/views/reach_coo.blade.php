@extends('layouts.main')

@section('title', 'Reach')

@section('sub_css_imports')
    <link rel="stylesheet" href="{{ mix('/css/coo.css') }}" type="text/css">
@endsection

@section('sub_content')
    <div class="reach-form-container">

        <h2>Reach Our COO</h2>

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

        <form method="get" action="/send/reach_coo/{{ auth()->user()->id }}" enctype=multipart/form-data>
            {{ csrf_field() }}

            <label class="block-label" for="message">Your message</label>
            <textarea class="form-text-area" name="message" id="message" rows="15"></textarea>

            <p class="form-flavour">We will get back to you with a reply to your email.</p>

            <a href="#" class="submit-button" onclick="parentNode.submit()">Send!</a>
        </form>
    </div>
@endsection