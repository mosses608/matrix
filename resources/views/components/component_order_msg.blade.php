@if(session()->has('component_order_msg'))
<div class="viewable-flash-message">
    <p>{{session('component_order_msg')}}</p>
    <button onclick="closeFlashMessage()">&times;</button>
</div>
@endif