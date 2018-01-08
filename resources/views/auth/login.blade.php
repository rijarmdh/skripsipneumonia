{{-- @extends('layouts.adminlte')
@section('adminlte') --}}

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../../plugins/iCheck/square/blue.css">


 
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body  class="hold-transition login-page" style="background-image: url('img/doctor.jpg'); background-size: 100%; background-attachment: fixed;">
    <div class="login-box">
      <div class="login-logo">
        <a href="../../index2.html">Halaman<b>Login</b></a>
      </div>
      <!-- /.login-logo -->
      <div class="login-box-body" style="opacity: 0.9;">
        <p class="login-box-msg">Login Untuk Dapat Melanjutkan</p>

        <form action="{{ url('/login') }}" method="post">

        {{ csrf_field() }}
          <div class="form-group has-feedback {{ $errors->has('email') ? ' has-error' : '' }}"">
            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="masukkan email" required autofocus>                    
                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>

          <div class="form-group has-feedback {{ $errors->has('password') ? ' has-error' : '' }}"">
            <input id="password" type="password" class="form-control" name="password" placeholder="masukkan password" required>              
                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="row">
            <div class="col-xs-8">
              <div class="checkbox icheck">
                <div>
                    <label>
                  <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : ''}}> Remember Me
                </label>    
                </div>
                
              </div>
            </div>
            <!-- /.col -->
            <div class="col-xs-4">
              <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
            </div>
            <!-- /.col -->
          </div>
        </form>

       {{--  <div class="social-auth-links text-center">
          <p>- OR -</p>
          <a href="{{ url('/password/reset') }}" style="background-color: #DF3D82;" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-edit"></i>Lupa Password ?</a>
       {{--    <a href="#" style="background-color: #DF3D82" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-edit"></i> Daftar Pengguna Baru</a> --}}
        {{-- </div>  --}}
        <!-- /.social-auth-links -->

        <a href="#"></a><br>
        <a href="register.html" class="text-center"></a>

      </div>
      <!-- /.login-box-body -->
    </div>
<!-- /.login-box -->
</body>
<!-- jQuery 2.2.3 -->
<script src="../../plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="../../bootstrap/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="../../plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>

{{-- @endsection --}}
