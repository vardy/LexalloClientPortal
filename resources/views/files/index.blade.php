@extends('layouts.main')

@section('title', 'Files')

@section('sub_css_imports')
    <script src="{{ mix('/js/sorttable.js') }}"></script>
    <link rel="stylesheet" href="{{ mix('/css/files.css') }}" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
@endsection

@section('sub_content')

        @include('files.file-nav-buttons')

        <div class="file-table-container">
            <div class="card">
                @if($files->isNotEmpty())
                    <table class="file-table sortable">
                        <tr class="heading-row">
                            <th class="heading-name">
                                File
                            </th>
                            <th class="heading-size">
                                Size
                            </th>
                            <th class="heading-date td-right">
                                Date
                            </th>
                        </tr>

                        @foreach($files as $file)
                            <form method="POST" action="/files/{{ $file->id }}">
                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}
                            </form>

                            <tr class="normal-row">
                                <td>
                                <span>
                                    <a target="_blank" rel="noopener noreferrer" href="/files/{{ $file->id }}/view">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="/files/{{ $file->id }}/edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form method="POST" action="/files/{{ $file->id }}" style="display: inline;">
                                        {{ method_field('DELETE') }}
                                        {{ csrf_field() }}

                                        <a href="#" onclick="if(confirm('Are you sure you want to delete?')){parentNode.submit()}">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>
                                    </form>
                                    <a href="/files/{{ $file->id }}">
                                        <i class="fas fa-cloud-download-alt"></i>
                                    </a>
                                    {{ $file->fileName }}
                                </span>
                                </td>
                                <td>
                                    <span>{{ substr(strval((int) $file->fileSize / 1000000), 0, 5) }} MB</span>
                                </td>
                                <td class="td-right">
                                    <span>{{ substr($file->created_at, 0, 10) }}</span>
                                </td>
                            </tr>
                        @endforeach

                    </table>
                @else
                    <p>Doesn't look like you have any files! You can start by clicking 'Upload a file'.</p>
                @endif
            </div>
        </div>
@endsection