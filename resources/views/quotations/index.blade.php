@extends('layouts.main')

@section('title', 'Quotations')

@section('sub_content')
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
@endsection