@extends('layouts.main')

@section('title', 'Reach')

@section('sub_css_imports')
    <link rel="stylesheet" href="{{ mix('/css/coo.css') }}" type="text/css">
@endsection

@section('sub_content')
    <div class="reach-form-container">
        <form>
            <h2>Reach Our COO</h2>

            <label class="block-label" for="message">Your message</label>
            <textarea class="form-text-area" name="message" id="message" rows="15"></textarea>

            <p class="form-flavour">We will get back to you with a reply to your email.</p>

            <a href="#" class="submit-button" onclick="parentNode.parentNode.submit()">Send!</a>
        </form>
    </div>
@endsection