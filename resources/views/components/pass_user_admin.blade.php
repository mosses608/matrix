@if (session()->has('pass_user_admin'))
<div class="viewable-flash-message">
    <p>{{session('pass_user_admin')}}</p>
    <button onclick="closeFlashMessage()">&times;</button>
</div>
@endif
