@if (session()->has('login_success_msg'))
<div class="viewable-flash-message">
    <p>{{session('login_success_msg')}}</p>
    <button onclick="closeFlashMessage()">&times;</button>
</div>
@endif
