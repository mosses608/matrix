@if (session()->has('text_message'))
<div class="viewable-flash-message">
    <p>{{session('text_message')}}</p>
    <button onclick="closeFlashMessage()">&times;</button>
</div>
@endif
