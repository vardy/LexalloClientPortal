@extends('layouts.master')

@section('title', 'Quotations')

@section('page_heading', 'Quotations')

@section('content')

    <div class="mdl-grid">
        <div class="mdl-cell mdl-cell--8-col">
            <div>
                <a href="/quotations/upload">Upload a quotation.</a>
            </div>
        </div>
    </div>

    <div class="mdl-grid">
        <div class="mdl-cell mdl-cell--8-col">
            <div>
                <ul>
                    @foreach($quotes as $quote)
                        <li>{{ $quote->quotationTitle }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection