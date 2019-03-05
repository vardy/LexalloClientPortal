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
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">
    <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>

    <!-- JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.js"></script>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</head>

<body class="mdl-demo mdl-color--grey-100 mdl-color-text--grey-700 mdl-base">
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>

    <div class="mdl-layout mdl-js-layout">

        <!-- Header content -->
        <header class="mdl-layout__header">
            <div class="mdl-layout-icon"></div>
            <div class="mdl-layout__header-row">

                <!-- Header title -->
                <span class="mdl-layout__title">Lexallo Client Portal</span>
                <div class="mdl-layout-spacer"></div>

                <nav class="mdl-navigation">

                    <!-- Header links -->
                    <a class="mdl-navigation__link" href="/quotations">Quotations</a>
                    <a class="mdl-navigation__link" href="/files">Files</a>
                    <a class="mdl-navigation__link" href="/support">Support</a>
                </nav>

                <nav class="mdl-navigation">
                    <a class="mdl-navigation__link" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                        Logout, {{ auth()->user()->name }}
                    </a>
                </nav>

            </div>
        </header>

        <!-- Drawer content -->
        <div class="mdl-layout__drawer">

            <!-- Drawer title -->
            <span class="mdl-layout__title">Client Portal</span>

            <nav class="mdl-navigation">

                    <!-- Drawer links -->
                    <a class="mdl-navigation__link" href="/quotations">Quotations</a>
                    <a class="mdl-navigation__link" href="/files">Files</a>
                    <a class="mdl-navigation__link" href="/support">Support</a>
                    <a class="dropdown-item mdl-navigation__link" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                        Logout, {{ auth()->user()->name }}
                    </a>
                </nav>
        </div>

        <!-- Main page content -->
        <main class="mdl-layout__content" style="padding-bottom: 50px;">

            <!-- Page heading -->
            <div class="mdl-grid">
                <div class="mdl-cell mdl-cell--8-col">
                    <h1>@yield('page_heading')</h1>
                </div>
            </div>

            <!-- Unique page content -->
            <div>
                @yield('content')
            </div>
        </main>

        <!-- Footer -->
        <footer class="mdl-mini-footer" style="padding: 20px 20px;">
            <div class="mdl-mini-footer__left-section">
                <ul class="mdl-mini-footer__link-list">
                    <li><a href="#">Help</a></li>
                    <li><a href="#">Privacy and Terms</a></li>
                    <li><a href="https://github.com/vardy/LexalloClientPortal/">GitHub</a></li>
                </ul>
            </div>
            <div class="mdl-mini-footer__right-section">
                <a href="http://lexallo.com/">
                   Lexallo
                </a>
            </div>
        </footer>

    </div>
</body>

<style>
    .mdl-demo .mdl-layout.is-small-screen .mdl-layout__header-row h3 {
        font-size: inherit;
    }
    .mdl-demo .mdl-layout__tab-bar-button {
        display: none;
    }
    .mdl-demo .mdl-layout.is-small-screen .mdl-layout__tab-bar .mdl-button {
        display: none;
    }
    .mdl-demo .mdl-layout:not(.is-small-screen) .mdl-layout__tab-bar,
    .mdl-demo .mdl-layout:not(.is-small-screen) .mdl-layout__tab-bar-container {
        overflow: visible;
    }
    .mdl-demo .mdl-layout__tab-bar-container {
        height: 64px;
    }
    .mdl-demo .mdl-layout__tab-bar {
        padding: 0;
        padding-left: 16px;
        box-sizing: border-box;
        height: 100%;
        width: 100%;
    }
    .mdl-demo .mdl-layout__tab-bar .mdl-layout__tab {
        height: 64px;
        line-height: 64px;
    }
    .mdl-demo .mdl-layout__tab-bar .mdl-layout__tab.is-active::after {
        background-color: white;
        height: 4px;
    }
    .mdl-demo main > .mdl-layout__tab-panel {
        padding: 8px;
        padding-top: 48px;
    }
    .mdl-demo .mdl-card {
        height: auto;
        display: flex;
        flex-direction: column;
    }
    .mdl-demo .mdl-card > * {
        height: auto;
    }
    .mdl-demo .mdl-card .mdl-card__supporting-text {
        margin: 40px;
        flex-grow: 1;
        padding: 0;
        color: inherit;
        width: calc(100% - 80px);
    }
    .mdl-demo.mdl-demo .mdl-card__supporting-text h4 {
        margin-top: 0;
        margin-bottom: 20px;
    }
    .mdl-demo .mdl-card__actions {
        margin: 0;
        padding: 4px 40px;
        color: inherit;
    }
    .mdl-demo .mdl-card__actions a {
        color: #617E8A;
        margin: 0;
    }
    .mdl-demo .mdl-card__actions a:hover,
    .mdl-demo .mdl-card__actions a:active {
        color: inherit;
        background-color: transparent;
    }
    .mdl-demo .mdl-card__supporting-text + .mdl-card__actions {
        border-top: 1px solid rgba(0, 0, 0, 0.12);
    }
    .mdl-demo #add {
        position: absolute;
        right: 40px;
        top: 36px;
        z-index: 999;
    }

    .mdl-demo .mdl-layout__content section:not(:last-of-type) {
        position: relative;
        margin-bottom: 48px;
    }
    .mdl-demo section.section--center {
        max-width: 860px;
    }
    .mdl-demo #features section.section--center {
        max-width: 620px;
    }
    .mdl-demo section > header{
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .mdl-demo section > .section__play-btn {
        min-height: 200px;
    }
    .mdl-demo section > header > .material-icons {
        font-size: 3rem;
    }
    .mdl-demo section > button {
        position: absolute;
        z-index: 99;
        top: 8px;
        right: 8px;
    }
    .mdl-demo section .section__circle {
        display: flex;
        align-items: center;
        justify-content: flex-start;
        flex-grow: 0;
        flex-shrink: 1;
    }
    .mdl-demo section .section__text {
        flex-grow: 1;
        flex-shrink: 0;
        padding-top: 8px;
    }
    .mdl-demo section .section__text h5 {
        font-size: inherit;
        margin: 0;
        margin-bottom: 0.5em;
    }
    .mdl-demo section .section__text a {
        text-decoration: none;
    }
    .mdl-demo section .section__circle-container > .section__circle-container__circle {
        width: 64px;
        height: 64px;
        border-radius: 32px;
        margin: 8px 0;
    }
    .mdl-demo section.section--footer .section__circle--big {
        width: 100px;
        height: 100px;
        border-radius: 50px;
        margin: 8px 32px;
    }
    .mdl-demo .is-small-screen section.section--footer .section__circle--big {
        width: 50px;
        height: 50px;
        border-radius: 25px;
        margin: 8px 16px;
    }
    .mdl-demo section.section--footer {
        padding: 64px 0;
        margin: 0 -8px -8px -8px;
    }
    .mdl-demo section.section--center .section__text:not(:last-child) {
        border-bottom: 1px solid rgba(0,0,0,.13);
    }
    .mdl-demo .mdl-card .mdl-card__supporting-text > h3:first-child {
        margin-bottom: 24px;
    }
    .mdl-demo .mdl-layout__tab-panel:not(#overview) {
        background-color: white;
    }
    .mdl-demo #features section {
        margin-bottom: 72px;
    }
    .mdl-demo #features h4, #features h5 {
        margin-bottom: 16px;
    }
    .mdl-demo .toc {
        border-left: 4px solid #C1EEF4;
        margin: 24px;
        padding: 0;
        padding-left: 8px;
        display: flex;
        flex-direction: column;
    }
    .mdl-demo .toc h4 {
        font-size: 0.9rem;
        margin-top: 0;
    }
    .mdl-demo .toc a {
        color: #4DD0E1;
        text-decoration: none;
        font-size: 16px;
        line-height: 28px;
        display: block;
    }
</style>

</html>