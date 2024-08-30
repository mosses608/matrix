@if (session()->has('pass_user_edited'))
<div class="viewable-flash-message">
    <p>{{session('pass_user_edited')}}</p>
    <button onclick="closeFlashMessage()">&times;</button>
</div>
@endif
