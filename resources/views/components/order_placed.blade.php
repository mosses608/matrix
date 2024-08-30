@if (session()->has('order_placed'))
<div class="viewable-flash-message">
    <p>{{session('order_placed')}}</p>
    <button onclick="closeFlashMessage()">&times;</button>
</div>
@endif
