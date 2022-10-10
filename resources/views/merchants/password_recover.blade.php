<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>Zoter - Responsive Bootstrap 4 Admin Dashboard</title>
    <meta content="Admin Dashboard" name="description" />
    <meta content="Mannatthemes" name="author" />
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
                    @elseif(Session::has('success_message'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        <strong></strong> {!! session('success_message') !!}
                    </div>
                    @else
                    <div class="alert alert-info alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                Enter your <b>Email</b> and instructions will be sent to you!
                            </div>
                    @endif

                    <div class="p-3">
                         @if($errors->any())
                            <div>
                            <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                            </ul>
                            </div>
                         @endif
                        <form id="forgotPassword" class="form-horizontal" action="{{ url('/merchant/forgot-password') }}" method="post"> {{ csrf_field() }}                            

                            <div class="form-group">
                                <div class="col-xs-12">
                                    <input class="form-control" type="email" name="email" required="" placeholder="Email">
                                </div>
                            </div>

                            <div class="form-group text-center row m-t-20">
                                <div class="col-12">
                                    <button class="btn btn-danger btn-block waves-effect waves-light" type="submit">Send Email</button>
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