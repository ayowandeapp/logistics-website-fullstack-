<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>Wanamove - Merchant - Register</title>
    <meta content="Register to Online Merchant Site" name="description" />
    <meta content="Online merchant registration" name="title" />
    <meta name="keywords" content="logistics registration merchant cargo courier">
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
                        <a href="index.html" class="logo logo-admin"><img src="{{ asset('images/backend_images/e-logo.png') }}" height="20" alt="logo"></a>
                    </div>
                    @if($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                        </ul>
                        </div>

                    @endif

                    <div class="p-3">
                        <form class="form-horizontal" action="{{ url('merchant/register') }}" method="post" id="registerForm">{{ csrf_field() }}

                            <div class="form-group row">
                                <div class="col-12">
                                    <input class="form-control" type="email" required="" placeholder="Email" name="email" id="email" value="{{ old('email') }}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-12">
                                    <input class="form-control" type="text" required="" placeholder="first_name" name="first_name" id="first_name" value="{{ old('first_name') }}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-12">
                                    <input class="form-control" type="text" required="" placeholder="last_name" name="last_name" id="last_name" value="{{ old('last_name') }}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-12">
                                    <input class="form-control" type="password" required="" placeholder="Password" name="password" id="password" id="password">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-12">
                                    <input class="form-control" type="password" required="" placeholder="Confirm Password" name="password_confirmation" id="password_confirmation">
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-12">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck1">
                                        <label class="custom-control-label font-weight-normal" for="customCheck1">I accept <a href="#" class="text-muted">Terms and Conditions</a></label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group text-center row m-t-20">
                                <div class="col-12">
                                    <button class="btn btn-danger btn-block waves-effect waves-light" type="submit">Register</button>
                                </div>
                            </div>

                            <div class="form-group m-t-10 mb-0 row">
                                <div class="col-12 m-t-20 text-center">
                                    <a href="{{ url('/merchant') }}" class="text-muted">Already have account?</a>
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