@if(Session::has('flash_message'))
    <div class="alert alert-success">{{Session::get('flash_message')}}</div>
@endif
@if(Session::has('error'))
    <div class="alert alert-danger">{{Session::get('error')}}</div>
@endif