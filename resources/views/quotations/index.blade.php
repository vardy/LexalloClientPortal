@extends('layouts.main')

@section('title', 'Quotations')

@section('sub_css_imports')
    <script src="{{ mix('/js/sorttable.js') }}"></script>
    <link rel="stylesheet" href="{{ mix('/css/quotations.css') }}" type="text/css">
@endsection

@section('quotations_btn_style', 'color: rgb(0, 174, 199);')

@section('sub_content')

    @include('quotations.quote-nav-buttons', ['current' => 'index'])

    <div class="quote-list-container">
        <div class="card">
            @if($quotes->isNotEmpty())
                <table class="quotations-table sortable">
                    <tr class="heading-row">
                        <th class="heading-name">
                            File Name
                        </th>
                        <th class="heading-date">
                            Date
                        </th>
                    </tr>

                    @foreach($quotes as $quote)
                        <tr class="normal-row">
                            <td class="name-cell">
                                <span class="truncate-span">
                                    <a class="icon-right" href="/quotations/{{ $quote->id }}">
                                        <i class="fas fa-cloud-download-alt"></i>
                                    </a>
                                    {{ $quote->quotationLabel }}
                                </span>
                            </td>
                            <td class="cell-right">
                                <span>{{ substr($quote->created_at, 0, 10) }}</span>
                            </td>
                        </tr>
                    @endforeach
                </table>
            @else
                <div class="no-quotes-container">
                    <p class="no-quotes-message">Nope! No quotations here!</p>
                </div>
            @endif
        </div>
    </div>
@endsection