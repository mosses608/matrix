@if (session()->has('error_message'))
<div class="viewable-flash-message">
    <p style="color: maroon;">{{session('error_message')}}</p>
    <button onclick="closeFlashMessage()">&times;</button>
</div>
@endif
