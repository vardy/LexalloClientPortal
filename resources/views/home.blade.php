@extends('layouts.home')

@section('title','Home')

@section('css_imports')
    <link rel="stylesheet" href="{{ mix('/css/app.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ mix('/css/home_page.css') }}" type="text/css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <script src="{{ mix('/js/hamburger.js') }}"></script>
@endsection

@section('nav_content')
    <a href="#" class="toggle-nav">
        <i class="fas fa-bars"></i>
    </a>
    <div class="navbar-links">
        <ul>
            <li><a href="https://lexallo.com/">Main Website</a></li>
            <li><a href="mailto:webmaster@lexallo.com">Support</a></li>
        </ul>
    </div>
@endsection

@section('body_classes')
    full-height-grow
@endsection

@section('container_classes')
    body-container
@endsection

@section('content')

<div class="title-header-area">
    <vue-typed-js :type-speed="65" :strings="['Let\'s get connected.']">
        <p><span class="typing"></span></p>
    </vue-typed-js>
    <span class="span-mobile">Let's get connected.</span>
</div>

<div class="login-form-area">
    <h1>Login</h1>

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="input-section">
            <label>Email:</label>
            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

            @if ($errors->has('email'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>

        <div class="input-section">
            <label>Password:</label>
            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" autocomplete="current-password" required>

            @if ($errors->has('password'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
        </div>

        <div class="input-section">
            <button type="submit" class="btn-login">Login</button>
        </div>

    </form>
</div>

@endsection
