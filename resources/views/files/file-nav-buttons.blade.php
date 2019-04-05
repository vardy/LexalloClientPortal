<div class="files-nav-buttons">
    <span id="list-button">
        <a style="@if($current == 'index')color: rgb(0, 174, 199);@endif" href="/files">
            <i class="fas fa-list-ul files-nav-icon"></i><br>
            View files repository
        </a>
    </span>
    <span id="upload-button">
        <a style="@if($current == 'create')color: rgb(0, 174, 199);@endif" href="/files/upload">
            <i class="fas fa-folder-plus files-nav-icon"></i><br>
            Upload a file
        </a>
    </span>
</div>