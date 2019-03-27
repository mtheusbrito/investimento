@if(session('success'))
@if(session('success')['success'])
<div class="box-body">
    <div class="alert alert-success alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      </h4> {{ session('success')['messages']}}
      
    </div>
</div>
@else

<div class="box-body">
    <div class="alert alert-danger alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      </h4> {{ session('success')['messages']}}
      
    </div>
</div>
@endif
@endif