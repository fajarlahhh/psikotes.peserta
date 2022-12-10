<div>
  @if (Session::has('danger'))
    <div class="alert alert-danger fade show" role="alert">
      <small>{!! Session::get('danger') !!}</small>
  @endif
  @if (Session::has('warning'))
    <div class="alert alert-warning fade show" role="alert">
      <small>{!! Session::get('danger') !!}</small>
    </div>
  @endif
  @if (Session::has('info'))
    <div class="alert alert-info fade show" role="alert">
      <small>{!! Session::get('danger') !!}</small>
    </div>
  @endif
  @if (Session::has('success'))
    <div class="alert alert-success fade show" role="alert">
      <small>{!! Session::get('danger') !!}</small>
    </div>
  @endif
</div>
