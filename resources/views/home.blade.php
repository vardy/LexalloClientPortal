@extends('layouts.home')

@section('title','Home')

@section('heading','Client Portal')

@section('content')

<!-- Square card -->
<style>
    .demo-card-square.mdl-card {
      width: 320px;
      height: 320px;
    }

    .demo-card-square > .mdl-card__title {
      color: #fff;
      background: url(/svg/desert-landscape.jpg) bottom right 15% no-repeat #46B6AC;
      background-size: 700px;
    }

    .grid-parent {
        text-align: center;
    }

    .grid-child {
        display: -moz-inline-stack;
        display: inline-block;
        vertical-align: top;
        zoom: 1;
        *display: inline;
        
        width: 320px;
        height: 320px;
        
        margin: 1%;
    }

    h1 { 
        font-family: Baskerville, "Baskerville Old Face", "Hoefler Text", Garamond, "Times New Roman", serif; 
        font-size: 100px; 
        font-style: normal; 
        font-variant: normal; 
        font-weight: 300; 
        line-height: 26.4px; 
    }
</style>

<div style="height:30px"></div>

<h1 style="color:white; text-align:center;">
    Let's get connected.
</h1>

<div style="height:80px"></div>

<div class="grid-parent">
    <div class="grid-child">
        <div class="demo-card-square mdl-card mdl-shadow--8dp">
          <div class="mdl-card__title mdl-card--expand" style="color: #fff; background: url(/svg/desert-landscape.jpg) 15% no-repeat #46B6AC; background-size: 700px;">
            <h2 class="mdl-card__title-text">Your Portal</h2>
          </div>
          <div class="mdl-card__supporting-text" style="text-align: left;">
            Access your home for quotations, file uploads and communications.
          </div>
          <div class="mdl-card__actions mdl-card--border">
            <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect" href="{{ route('login') }}">
              Login
            </a>
          </div>
        </div>
    </div>

    <div class="grid-child">
        <div class="demo-card-square mdl-card mdl-shadow--8dp">
          <div class="mdl-card__title mdl-card--expand" style="color: #fff; background: url(/svg/tundra-landscape.jpg) 15% no-repeat #46B6AC; background-size: 700px;">
            <h2 class="mdl-card__title-text">Lexallo</h2>
          </div>
          <div class="mdl-card__supporting-text" style="text-align: left;">
            Visit the lexallo website.
            <div style="height:18px"></div>
          </div>
          <div class="mdl-card__actions mdl-card--border">
            <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
              Visit
            </a>
          </div>
        </div>
    </div>

    <div class="grid-child">
        <div class="demo-card-square mdl-card mdl-shadow--8dp">
          <div class="mdl-card__title mdl-card--expand" style="color: #fff; background: url(/svg/forest-landscape.jpg) bottom right 15% no-repeat #46B6AC; background-size: 700px;">
            <h2 class="mdl-card__title-text">Support</h2>
          </div>
          <div class="mdl-card__supporting-text" style="text-align: left;">
            Get support.
            <div style="height:18px"></div>
          </div>
          <div class="mdl-card__actions mdl-card--border">
            <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
              Visit
            </a>
          </div>
        </div>
    </div>
</div>

@endsection
