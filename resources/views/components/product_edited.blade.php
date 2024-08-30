@if (session()->has('product_edited_full'))
<div class="viewable-flash-message">
    <p>{{session('product_edited_full')}}</p>
    <button onclick="closeFlashMessage()">&times;</button>
</div>
@endif
