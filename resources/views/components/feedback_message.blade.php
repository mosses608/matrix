@if (session()->has('feedback_message'))
<div class="viewable-flash-message">
    <p>{{session('feedback_message')}}</p>
    <button onclick="closeFlashMessage()">&times;</button>
</div>
@endif
