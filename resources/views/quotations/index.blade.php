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
                        <li style="margin-bottom: 15px">
                            {{ $quote->quotationTitle }}<br>
                            <form id="{{ $quote->id }}" method="POST" action="/quotations/{{ $quote->id }}">
                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}

                                <input type="hidden" name="quoteId" value="{{ $quote->id }}">

                                <a href="#" onclick="if(confirm('Are you sure you want to delete?')){parentNode.submit()}">REMOVE</a>
                            </form>
                            <a href="/quotations/{{ $quote->id }}/edit">
                                EDIT
                            </a><br>
                            <a href="/quotations/{{ $quote->id }}">
                                DOWNLOAD
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection