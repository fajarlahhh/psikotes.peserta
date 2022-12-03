<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{ config('app.name') }}</title>
  <link rel="icon" type="image/x-icon" href="{{ asset('dist/img/logo.png') }}">

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
        <a href="/">
          <img src="{{ asset('dist/img/logo.png') }}" style="width:100px"></a>
      </div>
      <div class="card-body">
        <p class="login-box-msg"><small>Masukkan No. Peserta dan Kata Sandi Anda</small></p>
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
