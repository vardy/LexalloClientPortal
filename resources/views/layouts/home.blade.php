<!DOCTYPE html>
<html>

<head>
    <title>@yield('title') | Client Portal</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.blue_grey-indigo.min.css" />
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:300,400,500,700" type="text/css">
    <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>

    <script src="{{ asset('js/app.js') }}" defer></script>
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>

<body>

    <style type="text/css">
        body {
            background-image: url(/svg/client_portal_home_background.jpg);
            background-repeat: no-repeat;
            background-size: 100%;
        }

        .demo-layout-transparent {
          background: url('../assets/demos/transparent.jpg') center / cover;
        }

        .demo-layout-transparent .mdl-layout__header,
        .demo-layout-transparent .mdl-layout__drawer-button {
          color: white;
        }

        .content-margin-top {
            margin-top: 5%;
        }
    </style>

    <div class="demo-layout-transparent mdl-layout mdl-js-layout">

        <!-- Header -->
        <header class="mdl-layout__header mdl-layout__header--transparent">
            <div class="mdl-layout__header-row">
                <!-- Title -->
                <span class="mdl-layout-title">@yield('heading')</span>
                <!-- Add spacer, to align navigation to the right -->
                <div class="mdl-layout-spacer"></div>
                <!-- Navigation -->
                <nav class="mdl-navigation">
                    @guest
                        <a class="mdl-navigation__link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    @else
                        <button id="demo-menu-lower-right" 
                                class="mdl-button mdl-js-button mdl-button--icon">
                            <i class="material-icons">more_vert</i>
                        </button>

                        <ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect"
                            for="demo-menu-lower-right">
                            <li class="mdl-menu__item">
                                <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                            </li>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </ul>
                    @endguest
                </nav>
            </div>
        </header>

        <!-- Drawer content -->
        <div class="mdl-layout__drawer mdl-layout--small-screen-only">

            <!-- Drawer title -->
            <span class="mdl-layout__title">Client Portal</span>

            <nav class="mdl-navigation">

                    <!-- Drawer links -->
                    <a class="mdl-navigation__link" href="{{ route('login') }}">{{ __('Login') }}</a>
                </nav>
        </div>

        <!-- Main page content -->
        <main class="mdl-layout__content content-margin-top">
            @yield('content')
        </main>

    </div>
</body>
</html>
