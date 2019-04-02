@extends('layouts.main')

@section('title', 'Quotations')

@section('sub_css_imports')
    <script src="{{ mix('/js/sorttable.js') }}"></script>
    <link rel="stylesheet" href="{{ mix('/css/quotations.css') }}" type="text/css">
@endsection

@section('quotations_btn_style', 'text-decoration: underline; font-weight: bold;')

@section('sub_content')

    @include('quotations.quote-nav-buttons')

    <div class="quote-list-container">
        <div class="card">
            @if($quotes->isNotEmpty())
                <ul>
                    @foreach($quotes as $quote)
                        <li class="quote-list-item">
                            <span class="quote-label">{{ $quote->quotationLabel }}</span>
                            <span>
                                <span class="quoteCreatedDate">{{ substr($quote->created_at, 0, 10) }}</span>
                                <a href="/quotations/{{ $quote->id }}">
                                    <i class="fas fa-cloud-download-alt"></i>
                                </a>
                                <a target="_blank" rel="noopener noreferrer" href="/quotations/{{ $quote->id }}/view">
                                    <i class="fas fa-eye"></i>
                                </a>
                            </span>
                        </li>
                    @endforeach
                </ul>
            @else
                <div class="no-quotes-container">
                    <p class="no-quotes-message">Nope! No quotations here!</p>
                </div>
            @endif
        </div>
    </div>
@endsection