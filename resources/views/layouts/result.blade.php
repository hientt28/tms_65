@if(session()->has('success'))
    <div class="alert alert-success"> {{ session('success') }}  </div>
@elseif(session()->has('errors'))
    <div class="alert alert-danger"> {{ session('errors') }}  </div>
@endif
