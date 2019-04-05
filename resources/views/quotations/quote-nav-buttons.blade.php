<div class="quotations-nav-buttons">
    <span id="list-button">
        <a href="/quotations">
            <i class="fas fa-list-ul quotes-nav-icon"></i><br>
            <span style="@if($current == 'index')text-decoration: underline; color: rgb(23, 63, 53);@endif">List quotes</span>
        </a>
    </span>
    <span id="request-button">
        <a href="mailto:connect@lexallo.com?subject=Client Quotation Request&amp;body=Please provide us with the following information and we’ll get back to you within 1 working day.%0A%0A[ Source Language ]%0A%0A%0A%0A[ Target Language ]%0A%0A%0A%0A[ Other Instructions / Comments ]%0A%0A%0A%0A[ Delivery Date and Time (please specify timezone) ]%0A%0A%0A%0A">
            <i class="fas fa-bolt quotes-nav-icon"></i><br>
            <span style="@if($current == 'request')text-decoration: underline; color: rgb(23, 53, 63);@endif">Request a quote</span>
        </a>
    </span>
</div>