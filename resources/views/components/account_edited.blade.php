@if (session()->has('account_edited'))
<div class="viewable-flash-message">
    <p>{{session('account_edited')}}</p>
    <button onclick="closeFlashMessage()">&times;</button>
</div>
@endif
