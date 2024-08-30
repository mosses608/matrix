@if(session()->has('comp_deleted'))
<div class="viewable-flash-message">
    <p>{{session('comp_deleted')}}</p>
    <button onclick="closeFlashMessage()">&times;</button>
</div>
@endif