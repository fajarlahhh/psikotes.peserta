<div>
  @if (isset($error))
    @if (is_array($error))
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <ul>
          @foreach ($errors->all() as $error)
            <li><small>{{ $error }}</small></li>
          @endforeach
        </ul>
      </div>
    @else
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <small>{{ $error }}</small>
      </div>
    @endif
  @endif
  @if ($errors->any())
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      <ul>
        @foreach ($errors->all() as $error)
          <li><small>{{ $error }}</small></li>
        @endforeach
      </ul>
    </div>
  @endif
</div>
