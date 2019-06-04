<div class="quotations-nav-buttons">
    <span id="list-button">
        <a style="@if($current == 'index')color: rgb(0, 174, 199);@endif" href="/quotations">
            <i class="fas fa-list-ul quotes-nav-icon"></i><br>
            List quotes
        </a>
    </span>
    <span id="request-button">
        <a style="@if($current == 'request')color: rgb(0, 174, 199);@endif" href="/quotations/request">
            <i class="fas fa-bolt quotes-nav-icon"></i><br>
            Request a quote
        </a>
    </span>
</div>