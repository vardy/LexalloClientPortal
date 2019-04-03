@extends('layouts.admin')

@section('title', 'Admin/Create/File')

@section('content')

    <p><a href="/admin/user/{{ $user->id }}">Back to editing {{ $user->name }}</a></p>

    <p>Uploading a new file for user {{ $user->name }}</p>

    <form method="POST" action="{{ route('files') }}" enctype="multipart/form-data">
        {{ csrf_field() }}

        <div>
            <input style="width: 1000px; height: 200px;" type="text" id="notes" name="notes">
        </div>

        <input type="hidden" name="locked" value="0">

        <div>
            <input type="checkbox" id="locked" name="locked" value="1">
            <label for="locked">Lock file?</label>
        </div>

        <div>
            <input type="checkbox" id="isDeliverable" name="isDeliverable" value="1">
            <label for="isDeliverable">Is file a deliverable?</label>
        </div>

        <div>
            <input type="file" name="uploadedFile" required>
        </div>

        <button type="submit">Upload file</button>
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