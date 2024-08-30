@if (session()->has('project_posted'))
<div class="viewable-flash-message">
    <p>{{session('project_posted')}}</p>
    <button onclick="closeFlashMessage()">&times;</button>
</div>
@endif
