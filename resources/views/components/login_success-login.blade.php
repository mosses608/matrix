@if (session()->has('login_success_login'))
<div class="viewable-flash-message">
    <p>{{session('login_success_login')}}</p>
    <button onclick="closeFlashMessage()">&times;</button>
</div>
@endif
