@extends('layouts.admin')

@section('title', 'Admin/Create/Quote')

@section('content')

    <p><a href="/admin/user/{{ $user->id }}">Back to editing {{ $user->name }}</a></p>

    <p>Uploading a new quotation for user {{ $user->name }}</p>

    <form method="POST" action="{{ route('quotations') }}" enctype="multipart/form-data">
        {{ csrf_field() }}

        <div>
            <input style="width: 250px;" type="text" id="quoteLabel" name="quoteLabel" required>
        </div>

        <div>
            <input type="file" name="uploadedFile" required>
        </div>

        <button type="submit">Upload quotation</button>
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

@endsection

