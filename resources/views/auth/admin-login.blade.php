
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Israel NKum">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('img/itsu.jpeg')}}">
    <title>Dues Management System</title>

    <!-- page css -->
    <link href="{{asset('css/pages/login-register-lock.css')}}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{asset('css/style.min.css')}}" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body class="skin-default card-no-border">
<!-- ============================================================== -->
<!-- Preloader - style you can find in spinners.css -->
<!-- ============================================================== -->
<div class="preloader">
    <div class="loader">
        <div class="loader__figure"></div>
        <p class="loader__label">Dues Management System</p>
    </div>
</div>
<!-- ============================================================== -->
<!-- Main wrapper - style you can find in pages.scss -->
<!-- ============================================================== -->
<section id="wrapper">
    <div class="login-register" style="background-image:url({{asset('img/back.png')}});">
        <div class="row">
            <div class="col-md-12 text-center">
                <h3>Union Management System</h3>
            </div>
        </div>
        <div class="login-box card">
            <div class="card-body">
                <form method="POST" id="loginform" class="form-horizontal form-material" action="{{ route('admin.login.submit') }}" aria-label="{{ __('Login') }}">
                    @csrf
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <img src="{{asset('img/loginHeader.png')}}" height="80" width="80">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-1 text-center">
                            <i class="fa fa-user font-20 mt-3"></i>
                        </div>
                        <div class="col-md-11">
                            <input id="username" type="text" placeholder="Username" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}" required autofocus>
                            @if ($errors->has('username'))
                                <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('username') }}</strong>
                            </span>
                            @endif
                            @if(session('error'))
                                <strong class="text-danger">{{ session('error') }}</strong>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-1 text-center">
                            <i class="fa fa-lock font-20 mt-3"></i>
                        </div>
                        <div class="col-md-11">
                            <input id="password" type="password" placeholder="Password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                            @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-12">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary btn-block">
                                {{ __('Login') }}
                            </button>

                            {{--<a class="btn btn-link" href="{{ route('admin.password.request') }}">--}}
                            {{--{{ __('Forgot Your Password?') }}--}}
                            {{--</a>--}}
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<script src="{{asset('js/jquery-3.2.1.min.js')}}"></script>
<!-- Bootstrap popper Core JavaScript -->
<script src="{{asset('js/popper.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script><!--Custom JavaScript -->
<script type="text/javascript">
    $(function() {
        $(".preloader").fadeOut();
    });
    $(function() {
        $('[data-toggle="tooltip"]').tooltip()
    });
    // ==============================================================
    // Login and Recover Password
    // ==============================================================
    $('#to-recover').on("click", function() {
        $("#loginform").slideUp();
        $("#recoverform").fadeIn();
    });
</script>

</body>
</html>
