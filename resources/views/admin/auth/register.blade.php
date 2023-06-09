<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ env('APP_NAME') }} | Log in </title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('backend/assets/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{asset('backend/assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('backend/assets/dist/css/adminlte.min.css')}}">
</head>
<body class="hold-transition login-page">
<div class="login-box">
    <!-- /.login-logo -->
    <div class="card card-outline card-primary">
        <div class="card-header text-center">
            <a href="{{url('/')}}" class="h1"><b>{{ env('APP_NAME') }}</b></a>
        </div>
        <div class="card-body">
            <p class="login-box-msg">Register a new membership</p>

            <form action="{{route('register')}}" method="post">
                @csrf
                <div class="input-group mb-3">
                    <input type="text" name="name" value="{{ old('name') }}"
                           class="form-control @error('name') is-invalid @enderror " placeholder="Full name">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                    @error('name')
                    <span class="error invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
                <div class="input-group mb-3">
                    <input type="email" name="email" value="{{ old('email') }}" class="form-control @error('name') is-invalid @enderror"
                           placeholder="Email">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                    @error('email')
                    <span class="error invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
                <div class="input-group mb-3">
                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                    @error('password')
                    <span class="error invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="input-group mb-3">
                    <input type="password" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" placeholder="Retype password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                    @error('password_confirmation')
                    <span class="error invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="row">
                {{--                    <div class="col-8">--}}
                {{--                        <div class="icheck-primary">--}}
                {{--                            <input type="checkbox" id="agreeTerms" name="terms" value="agree">--}}
                {{--                            <label for="agreeTerms">--}}
                {{--                                I agree to the <a href="#">terms</a>--}}
                {{--                            </label>--}}
                {{--                        </div>--}}
                {{--                    </div>--}}
                <!-- /.col -->
                    <div class="col-12">
                        <button type="submit" class="btn text-center btn-primary btn-block">Register</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>

            {{--            <div class="social-auth-links text-center">--}}
            {{--                <a href="#" class="btn btn-block btn-primary">--}}
            {{--                    <i class="fab fa-facebook mr-2"></i>--}}
            {{--                    Sign up using Facebook--}}
            {{--                </a>--}}
            {{--                <a href="#" class="btn btn-block btn-danger">--}}
            {{--                    <i class="fab fa-google-plus mr-2"></i>--}}
            {{--                    Sign up using Google+--}}
            {{--                </a>--}}
            {{--            </div>--}}

            <a href="{{route('login')}}" class="text-center">I already have a membership</a>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="{{asset('backend/assets/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('backend/assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('backend/assets/dist/js/adminlte.min.js')}}"></script>
</body>
</html>
