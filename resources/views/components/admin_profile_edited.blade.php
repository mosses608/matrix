@if (session()->has('admin_profile_edited'))
<div class="viewable-flash-message">
    <p>{{session('admin_profile_edited')}}</p>
    <button onclick="closeFlashMessage()">&times;</button>
</div>
@endif
