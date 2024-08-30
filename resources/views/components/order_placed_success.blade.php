@if (session()->has('order_placed_success'))
<div class="viewable-flash-message">
    <p>{{session('order_placed_success')}}</p>
    <button onclick="closeFlashMessage()">&times;</button>
</div>
@endif
