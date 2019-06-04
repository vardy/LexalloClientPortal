@extends('layouts.master_new')

<!--
    Yields:
     - sub_content
     - sub_css_imports
     - header_flavour
     - uploads_btn_style
     - quotations_btn_style
-->

@section('css_imports')
    <link rel="stylesheet" href="{{ mix('/css/app.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ mix('/css/main.css') }}" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <script src="{{ mix('/js/hamburger.js') }}"></script>
    @yield('sub_css_imports')
@endsection

@section('nav_content')
    <a href="#" class="toggle-nav">
        <i class="fas fa-bars"></i>
    </a>
    <div class="navbar-links">
        <ul>
            @if(auth()->user()->hasAnyRole(['admin', 'pm']))
                <li><a href="/admin">Admin Panel</a></li>
            @endif
            <li><a href="{{ route('files') }}" style="@yield('uploads_btn_style')">Uploads</a></li>
            <li><a href="{{ route('quotations') }}" style="@yield('quotations_btn_style')">Quotations</a></li>
            <li><a href="{{ route('reach') }}">Reach Our COO</a></li>
            <li><div class="vertical-separator"></div></li>
            <li>
                <form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: inline;">
                    @csrf

                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();">
                        {{ auth()->user()->name }}, logout
                    </a>
                </form>
            </li>
        </ul>
    </div>
@endsection

@section('body_classes')
    body-container
@endsection

@section('container_classes')
    full-height-grow
@endsection

@section('content')
    @yield('sub_content')
@endsection

@section('footer')
    <footer class="main-footer">
        <div class="body-container">
            <nav class="footer-nav">
                <ul>
                    <li><a href="mailto:webmaster@lexallo.com">Technical Support</a></li>
                    <li><a href="http://lexallo.com/privacy-policy/">Privacy Policy</a></li>
                    <li><a href="http://lexallo.com/blog/ ">Blog</a></li>
                </ul>
            </nav>

            <nav class="footer-nav">
                <ul>
                    <li>
                        <a href="https://www.facebook.com/Lexallo.l10n/" class="social-link">
                        <img alt="Facebook Icon" src="{{ asset('images/facebook.svg') }}">
                        Facebook
                    </a>
                    </li>
                <li>
                    <a href="http://linkedin.com/company/lexallo" class="social-link">
                        <img alt="LinkedIn Icon" src="{{ asset('images/linkedin.svg') }}">
                        LinkedIn
                    </a>
                </li>
                </ul>
            </nav>
        </div>
    </footer>
@endsection