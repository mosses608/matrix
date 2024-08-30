@if (session()->has('product_added'))
<div class="viewable-flash-message">
    <p>{{session('product_added')}}</p>
    <button onclick="closeFlashMessage()">&times;</button>
</div>
@endif
