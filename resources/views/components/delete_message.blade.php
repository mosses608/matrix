@if (session()->has('delete_message'))
<div class="viewable-flash-message">
    <p>{{session('delete_message')}}</p>
    <button onclick="closeFlashMessage()">&times;</button>
</div>
@endif
