<!DOCTYPE html>
<html lang="en">

<!--
  Yields:
    - title
    - css_imports
    - nav_content
    - content
-->

<head>
    <title>@yield('title') | Client Portal</title>

    <meta name="description" content="Lexallo translation and localisation service 'client' portal website for clients to access quotations, upload files and send support messages.">
    <meta name="keywords" content="translation, localisation, lexallo, clients, portal, fast, quality, support, service, quotations, invoices, files, upload">
    <meta name="author" content="Jarred Vardy">
    <meta name="theme-color" content="#FFFFFF"/>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @yield('css_imports')
</head>

<body class="body-container full-height-grow">

    <!-- Header -->
    <header class="home-header">
        <a href="#" class="home-brand-logo">
            <img alt="brand-logo" src="{{ asset('images/brand-logo.gif') }}" class="home-brand-image-properties">
            <div class="home-brand-logo-text">
                Client Portal
            </div>
        </a>

        <nav class="home-nav">
            <ul>
                @yield('nav_content')
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
    <script src="{{ mix('/js/manifest.js') }}"></script>
    <script src="{{ mix('/js/vendor.js') }}"></script>
    <script src="{{ mix('/js/app.js') }}"></script>

</body>
</html>
