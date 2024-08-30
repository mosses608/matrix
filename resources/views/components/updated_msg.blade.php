@if(session()->has('updated_msg'))
<div class="viewable-flash-message">
    <p>{{session('updated_msg')}}</p>
    <button onclick="closeFlashMessage()">&times;</button>
</div>
@endif