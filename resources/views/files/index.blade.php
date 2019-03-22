@extends('layouts.main')

@section('title', 'Files')

@section('sub_css_imports')
    <script src="{{ mix('/js/sorttable.js') }}"></script>
    <link rel="stylesheet" href="{{ mix('/css/files.css') }}" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
@endsection

@section('sub_content')
    <!-- <div>
        <a href="/files/upload">Upload a file.</a>

        <ul>
            @foreach($files as $file)
                <li style="margin-bottom: 15px">
                    {{ $file->fileName }}<br>
                    <form method="POST" action="/files/{{ $file->id }}">
                        {{ method_field('DELETE') }}
                        {{ csrf_field() }}

                        <a href="#" onclick="if(confirm('Are you sure you want to delete?')){parentNode.submit()}">Delete</a>
                    </form>
                    <a href="/files/{{ $file->id }}/edit">
                        Edit
                    </a><br>
                    <a href="/files/{{ $file->id }}">
                        Download
                    </a><br>
                    <a target="_blank" rel="noopener noreferrer" href="/files/{{ $file->id }}/view">
                        View
                    </a>
                </li>
            @endforeach
        </ul>
    </div> -->
        <div class="files-nav-buttons">
            <span id="upload-button">
                <a href="/files/upload">
                    <i class="fas fa-folder-plus files-nav-icon"></i><br>
                    Upload a file
                </a>
            </span>
            <span id="list-button">
                <a href="/files">
                    <i class="fas fa-list-ul files-nav-icon"></i><br>
                    List files
                </a>
            </span>
        </div>

        <div class="file-table-container">
            <div class="card">
                <table class="file-table sortable">
                    <tr class="heading-row">
                        <th class="heading-name">
                            File
                        </th>
                        <th class="heading-size">
                            Size
                        </th>
                        <th class="heading-type td-right">
                            Type
                        </th>
                    </tr>

                    @foreach($files as $file)
                        <tr class="normal-row">
                            <td>
                            <span>
                                <a>
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a>
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a>
                                    <i class="fas fa-trash-alt"></i>
                                </a>
                                {{ $file->fileName }}
                            </span>
                            </td>
                            <td>
                                <span>{{ $file->fileSize }} Bytes</span>
                            </td>
                            <td class="td-right">
                                <span>{{ $file->fileExtension }}</span>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
@endsection