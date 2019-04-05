<div class="files-nav-buttons">
    <span id="list-button">
        <a href="/files">
            <i class="fas fa-list-ul files-nav-icon"></i><br>
            <span style="@if($current == 'index')text-decoration: underline; color: rgb(0, 174, 199);@endif">View files repository</span>
        </a>
    </span>
    <span id="upload-button">
        <a href="/files/upload">
            <i class="fas fa-folder-plus files-nav-icon"></i><br>
            <span style="@if($current == 'create')text-decoration: underline; color: rgb(23, 63, 53);@endif">Upload a file</span>
        </a>
    </span>
</div>