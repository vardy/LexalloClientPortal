@extends('layouts.admin')

@section('title', 'Admin/Edit/Quote')

@section('content')
    <p><a href="/admin/user/{{ $user->id }}">Back to editing {{ $user->name }}</a></p>

    <p>Editing file {{ $quote->quotationLabel }} for user {{ $user->name }}</p>

    <form id="form_edit" method="POST" action="/quotations/{{ $quote->id }}">
        {{ method_field('PATCH') }}
        {{ csrf_field() }}

        <div>
            <input type="text" id="quotationLabel" name="quotationLabel" value="{{ $quote->quotationLabel }}" required>
        </div>

        <button type="submit">Update quotation</button>
    </form>

    @if($errors->any())
        <div>
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="/quotations/{{ $quote->id }}">
        {{ method_field('DELETE') }}
        {{ csrf_field() }}

        <a href="#" onclick="if(confirm('Are you sure you want to delete?')){parentNode.submit()}">Delete</a>
    </form>
@endsection