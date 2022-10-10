<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>Wanamove - Merchant - Login</title>
    <meta content="Login to Online Merchant Site" name="description" />
    <meta content="Online logistics merchant site" name="title" />
    <meta name="keywords" content="logistics login merchant cargo courier">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <link href="{{ asset('css/backend_css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/backend_css/icons.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/backend_css/style.css') }}" rel="stylesheet" type="text/css">

</head>
<body>
<!-- Begin page -->
<div class="accountbg"></div>
<div class="wrapper-page">

    <div class="card">
        <div class="card-body">

            <div class="text-center">
                <a href="{{ url('/merchant') }}" class="logo logo-admin"><img src="{{ asset('images/backend_images/e-logo.png') }}" height="20" alt="logo"></a>
            </div>
            @if(Session::has('error_message'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <strong>Oh snap!</strong> {!! session('error_message') !!}
            </div>
            @endif
            @if(Session::has('success_message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <strong></strong> {!! session('success_message') !!}
            </div>
            @endif

            <div class="px-3 pb-3">
                <form class="form-horizontal m-t-20" method="post" action="{{ url('/merchant') }}" id="loginForm"> {{ csrf_field() }}
                    @if($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                        </ul>
                        </div>
                    @endif

                    <div class="form-group row">
                        <div class="col-12">
                            <input class="form-control" type="email" required placeholder="Email" name="email" id="email" value="{{ old('email') }}" autofocus>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-12">
                            <input class="form-control" type="password" required="" placeholder="Password" name="password" id="password">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-12">
                            <div class="custom-control custom-checkbox">
                                <label><input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group text-center row m-t-20">
                        <div class="col-12">
                            <button class="btn btn-danger btn-block waves-effect waves-light" type="submit">Log In</button>
                        </div>
                    </div>

                    <div class="form-group m-t-10 mb-0 row">
                        <div class="col-sm-7 m-t-20">
                            <a href="{{ url('/merchant/forgot-password') }}" class="text-muted"><i class="mdi mdi-lock"></i> <small>Forgot your password ?</small></a>
                        </div>
                        <div class="col-sm-5 m-t-20">
                            <a href="{{ url('/merchant/register') }}" class="text-muted"><i class="mdi mdi-account-circle"></i> <small>Create an account ?</small></a>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
<!-- jQuery  -->
<script src="{{ asset('js/backend_js/jquery.min.js') }}"></script>
<script src="{{ asset('js/backend_js//popper.min.js') }}"></script>
<script src="{{ asset('js/backend_js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/backend_js/modernizr.min.js') }}"></script>
<script src="{{ asset('js/backend_js/detect.js') }}"></script>
<script src="{{ asset('js/backend_js/fastclick.js') }}"></script>
<script src="{{ asset('js/backend_js/jquery.blockUI.js') }}"></script>
<script src="{{ asset('js/backend_js/waves.js') }}"></script>
<script src="{{ asset('js/backend_js/jquery.nicescroll.js') }}"></script>
<script src="{{ asset('js/backend_js/jquery.validate.js') }}"></script>
<script src="{{ asset('js/backend_js/main.js') }}"></script>

<!-- App js -->
<script src="{{ asset('js/backend_js/app.js') }}"></script>

</body>
</html>