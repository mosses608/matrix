@if (session()->has('news_message'))
<div class="viewable-flash-message">
    <p>{{session('news_message')}}</p>
    <button onclick="closeFlashMessage()">&times;</button>
</div>
@endif
