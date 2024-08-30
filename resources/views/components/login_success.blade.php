@if (session()->has('login_success'))
<div class="viewable-flash-message">
    <p>{{session('login_success')}}</p>
    <button onclick="closeFlashMessage()">&times;</button>
</div>
@endif
