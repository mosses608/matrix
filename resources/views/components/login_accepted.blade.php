@if (session()->has('login_accepted'))
<div class="viewable-flash-message">
    <p>{{session('login_accepted')}}</p>
    <button onclick="closeFlashMessage()">&times;</button>
</div>
@endif
