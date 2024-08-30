@if(session()->has('component_mesg'))
<div class="viewable-flash-message">
    <p>{{session('component_mesg')}}</p>
    <button onclick="closeFlashMessage()">&times;</button>
</div>
@endif