@extends('layouts.master')

@section('title', 'Quotations')

@section('page_heading', 'Quotations')

@section('content')

    <div class="mdl-grid">
        <!-- <div class="mdl-cell mdl-cell--8-col">
            <div>
                <a href="/quotations/upload">Upload a quotation.</a>
            </div>
        </div> -->
    </div>

    <div class="mdl-grid">
        <div class="mdl-cell mdl-cell--8-col">
            <div>
                <ul>
                    @foreach($quotes as $quote)
                        <li style="margin-bottom: 15px">
                            {{ $quote->quotationLabel }}<br>
                            <a href="/quotations/{{ $quote->id }}">
                                Download
                            </a><br>
                            <a target="_blank" rel="noopener noreferrer" href="/quotations/{{ $quote->id }}/view">
                                View
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection