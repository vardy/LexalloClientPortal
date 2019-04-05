<div class="quotations-nav-buttons">
    <span id="list-button">
        <a href="/quotations">
            <i class="fas fa-list-ul quotes-nav-icon"></i><br>
            <span style="@if($current == 'index')text-decoration: underline; color: rgb(23, 63, 53);@endif">List quotes</span>
        </a>
    </span>
    <span id="request-button">
        <a href="/quotations#">
            <i class="fas fa-bolt quotes-nav-icon"></i><br>
            <span style="@if($current == 'request')text-decoration: underline; color: rgb(23, 53, 63);@endif">Request a quote</span>
        </a>
    </span>
</div>