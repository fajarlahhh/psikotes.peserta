<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{ config('app.name') }}</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{ asset('/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('/dist/css/adminlte.min.css') }}">
  @livewireStyles
</head>

<body class="hold-transition login-page">
  <div class="login-box">
    <div class="card card-outline card-primary">
      <div class="card-header text-center">
        <a href="/" class="h1">
          {{ config('app.name') }}</a>
      </div>
      <div class="card-body">
        <p class="login-box-msg">Sign in to start your session</p>
        @livewire('login')
      </div>
      <div class="card-footer text-center">
        <small>Copyright ©2022</small>
      </div>
    </div>
  </div>

  @livewireScripts
  <script src="{{ asset('/plugins/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('/dist/js/adminlte.min.js') }}"></script>
</body>

</html>
