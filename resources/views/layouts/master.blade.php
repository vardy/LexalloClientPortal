<!DOCTYPE html>
<html>

<head>
    <title>@yield('title') | Client Portal</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Material design styling and assets -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.blue_grey-indigo.min.css" />
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:300,400,500,700" type="text/css">
    <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>

</head>

<body>
    <div class="mdl-layout mdl-js-layout">

        <!-- Header content -->
        <header class="mdl-layout__header">
            <div class="mdl-layout-icon"></div>
            <div class="mdl-layout__header-row">

                <!-- Header title -->
                <span class="mdl-layout__title">Asial10n Client Portal</span>
                <div class="mdl-layout-spacer"></div>

                <nav class="mdl-navigation">

                    <!-- Header links -->
                    <a class="mdl-navigation__link" href="/quotations">Quotations</a>
                    <a class="mdl-navigation__link" href="/files">Files</a>
                    <a class="mdl-navigation__link" href="/bbb">Big Blue Button</a>
                </nav>

                <nav class="mdl-navigation">
                    <a class="dropdown-item mdl-navigation__link" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </nav>

            </div>
        </header>

        <!-- Drawer content -->
        <div class="mdl-layout__drawer">

            <!-- Drawer title -->
            <span class="mdl-layout__title">Client Portal</span>

            <nav class="mdl-navigation">

                    <!-- Drawer links -->
                    <a class="mdl-navigation__link" href="/login">Login</a>
                    <a class="mdl-navigation__link" href="/quotations">Quotations</a>
                    <a class="mdl-navigation__link" href="/files">Files</a>
                    <a class="mdl-navigation__link" href="/bbb">Big Blue Button</a>
                </nav>
        </div>

        <!-- Main page content -->
        <main class="mdl-layout__content">

            <!-- Page heading -->
            <div class="mdl-grid">
                <div class="mdl-cell mdl-cell--8-col">
                    <h1>@yield('page_heading')</h1>
                </div>
            </div>

            <div class="mdl-grid">
                <!-- GRID CONTENT -->
            </div>

            <div>
                @yield('content')
            </div>
        </main>

        <!-- Footer -->
        <footer class="mdl-mini-footer">
            <div class="mdl-mini-footer__left-section">
                <ul class="mdl-mini-footer__link-list">
                    <li><a href="#">Help</a></li>
                    <li><a href="#">Privacy and Terms</a></li>
                    <li><a href="https://github.com/vardy/Client.Portal.Services/">GitHub</a></li>
                </ul>
            </div>
            <div class="mdl-mini-footer__right-section">
                <a href="http://www.asialion.com/">
                    <img src="http://www.asialion.com/en/wp-content/uploads/sites/3/2014/11/AsiaL10N-Logo_White_29Oct2014-1.png" alt="ASIAL10N" style="width:171.32px;height:50px" />
                </a>
            </div>
        </footer>

    </div>
</body>

</html>