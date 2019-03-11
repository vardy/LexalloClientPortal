<!DOCTYPE html>
<html>

<head>
    <title>@yield('title') | Client Portal</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <!-- <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.blue_grey-indigo.min.css" /> -->
    <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>

    @yield('css_imports')
</head>

<body class="body-container full-height-grow">

    <!-- Header -->
    <header class="home-header">
        <a href="#" class="home-brand-logo">
            <img src="images/brand-logo.gif" class="home-brand-image-properties">
            <div class="home-brand-logo-text">
                Client Portal
            </div>
        </a>

        <nav class="home-nav">
            <ul>
                <li><a href="https://lexallo.com/">Main Website</a></li>
                <li><a href="{{ route('support') }}">Support</a></li>
            </ul>
        </nav>
    </header>

    <section id="app" class="home-main-section">
        @yield('content')
    </section>

    <div class="home-page-circle-1"></div>
    <div class="home-page-circle-2"></div>
    <div class="home-page-circle-3"></div>

    <!-- Local JS Scripts -->
    <script src="{{ asset('js/manifest.js') }}"></script>
    <script src="{{ asset('js/vendor.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>

</body>
</html>
