@if(session()->has('feedback_sent'))
<div class="viewable-flash-message">
    <p>{{session('feedback_sent')}}</p>
    <button onclick="closeFlashMessage()">&times;</button>
</div>
@endif