<?php
/**
 * Created by PhpStorm.
 * User: softy
 * Date: 29/09/20
 * Time: 02:16
 */ ?>

@extends('layouts/merchantLayout/merchant_design')
@section('content')
<div class="container-fluid">

<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <div class="btn-group float-right">
                <ol class="breadcrumb hide-phone p-0 m-0">
                    <li class="breadcrumb-item"><a href="{{ url('/merchant/dashboard') }}">Wanamove</a></li>
                    <li class="breadcrumb-item active">Settings</li>
                </ol>
            </div>
            <h4 class="page-title">Settings</h4>
        </div>
    </div>
    <div class="clearfix"></div>
</div>
<!-- end page title end breadcrumb -->
<div class="row">
    <div class="col-lg-10">
        <div class="card">
            <div class="card-body">

                <h4 class="mt-0 header-title">Change password</h4>
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
                    <strong>Oh snap!</strong> {!! session('success_message') !!}
                </div>
                @endif

                <form class="" method="post" action="{{ url('/merchant/update-password') }}" id="settings_form"> {{ csrf_field() }}
                    <div class="form-group mb-0">
                        <label class="mb-2 pb-1">Current Password</label>
                        <input type="password" id="current_password" class="form-control" required placeholder="Current password" name="current_password"/>
                        <span id="chkPwd" ></span>
                    </div>

                    <div class="form-group mb-0">
                        <label class="my-2 py-1">New Password</label>
                        <div>
                            <input type="password" id="pass2" class="form-control" required
                                   placeholder="Password" name="new_password" />
                        </div>
                        <div class="m-t-10">
                            <input type="password" class="form-control" required
                                   data-parsley-equalto="#pass2"
                                   placeholder="Re-Type Password"/>
                        </div>
                    </div>
                    <br>
                    <div class="form-group mb-0">
                        <div>
                            <button type="submit" class="btn btn-primary waves-effect waves-light" name="update_password">
                                Update password
                            </button>
                            <button type="reset" class="btn btn-secondary waves-effect m-l-5">
                                Cancel
                            </button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div> <!-- end col -->

</div> <!-- end row -->

</div><!-- container -->
@endsection

@section('plugins')
<script src="{{ asset('js/backend_js/plugins/parsleyjs/parsley.min.js') }}"></script>
@endsection
@section('pages')
<script type="text/javascript">
    $(document).ready(function() {
        $('#settings_form').parsley();
        $('#current_password').on('keyup', function(event){
            event.preventDefault();
            if($('#current_password').parsley().isValid()){
                var current_pwd = $('#current_password').val();
                //alert(current_pwd);
                $.ajax({
                    type:'get',
                    url:'/merchant/check-pwd',
                    data:{current_pwd:current_pwd},
                    success:function(resp){
                         //alert(resp);
                        if(resp=='false'){
                            $('#chkPwd').html("<font color='red'>Current Password is Incorrect</font>");
                        }else if(resp=='true'){
                            $('#chkPwd').html("<font color='green'>Current Password is Correct</font>");
                        }
                    },error:function(){
                        //alert('Error');
                    }
                })

            }
        })
    });
</script>
@endsection
