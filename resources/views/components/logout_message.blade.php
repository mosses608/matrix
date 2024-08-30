@if (session()->has('logout_message'))
<div class="viewable-flash-message">
    <p>{{session('logout_message')}}</p>
    <button onclick="closeFlashMessage()">&times;</button>
</div>
@endif
