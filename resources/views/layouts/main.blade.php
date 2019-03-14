@extends('layouts.master_new')

<!--
    Yields:
     - sub_content
     - sub_css_imports
-->

@section('css_imports')
    <link rel="stylesheet" href="{{ mix('/css/main.css') }}" type="text/css">
    @yield('sub_css_imports')
@endsection

@section('content')
    @yield('sub_content')
@endsection

@section('footer')
    <footer class="main-footer">
        <div class="body-container">
            <nav class="footer-nav">
                <ul>
                    <li><a href="#">Beliefs</a></li>
                    <li><a href="#">Our Team</a></li>
                    <li><a href="#">Expertise</a></li>
                    <li><a href="#">Process</a></li>
                    <li><a href="#">Blog</a></li>
                    <li><a href="#">Contact</a></li>
                    <li><a href="#">Blog</a></li>
                </ul>
            </nav>

            <nav class="footer-nav">
                <li><a href="#" class="social-link">
                        <img alt="Facebook Icon" src="{{ asset('svg/facebook.svg') }}" style="height: 40px; width: 40px">
                        Facebook
                    </a></li>
                <li><a href="#" class="social-link">
                        <img alt="Twitter Icon" src="{{ asset('svg/twitter.svg') }}" style="width: 40px; height: 40px">
                        Twitter
                    </a></li>
                <li><a href="#" class="social-link">
                        <img alt="LinkedIn Icon" src="{{ asset('svg/linkedin.svg') }}" style="width: 40px; height: 40px">
                        LinkedIn
                    </a></li>
            </nav>
        </div>
    </footer>
@endsection