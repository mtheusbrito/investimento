@if(session('success'))

<div class="alert alert-success">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    {{ session('success')['messages'] }}
</div>

@else
<!-- <div class="alert alert-danger">
    {{ session('success')['messages'] }}
</div> -->
@endif