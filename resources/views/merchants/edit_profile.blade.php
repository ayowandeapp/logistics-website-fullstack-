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
                        <li class="breadcrumb-item"><a href="{{ url('/merchant/dashbard')}}">Wanamove</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('/merchant/view_profile')}}">Profile</a></li>
                        <li class="breadcrumb-item active">Edit profile</li>
                    </ol>
                </div>
                <h4 class="page-title">Edit Profile</h4>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
    <!-- end page title end breadcrumb -->
    <div class="row">
        <div class="col-lg-10">
            <div class="card">
                <div class="card-body">

                    <h4 class="mt-0 header-title">Edit Profile</h4>
                    <p class="text-muted mb-4 font-14"></p>
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


                    <form class="" method="post" action="{{ url('/merchant/edit_profile') }}" id="add_profile"> {{ csrf_field() }}
                        <div class="row">
                            <div class="col-md-6">
                                <h6 class="sub-title mb-3">First Name</h6>
                                <div class="input-group clockpicker">
                                    <input type="text" class="form-control" name="first_name" required value="{{ $viewProfile->user_detail->first_name }}">
                                </div>
                                <h6 class="sub-title my-3">Country</h6>
                                        <select class="form-control" name="country_name" required="">
                                            <option value="">Select</option>
                                            @foreach($countries as $country)
                                            <option value="{{ $country->country_name }}" @if($viewProfile->user_detail->country == $country->country_name) selected="" @endif>{{ $country->country_name }}</option>
                                            @endforeach
                                        </select>


                                <h6 class="sub-title my-3">Date of Birth</h6>
                                    <input class="form-control" type="date" value="2011-08-19" id="example-date-input" name="dob" @if($viewProfile->user_detail->dob)value="{{ $viewProfile->user_detail->dob }}" @endif>

                            </div>
                            <div class="col-md-6">
                                <h6 class="sub-title mb-3">Last Name</h6>
                                <div class="input-group clockpicker">
                                    <input type="text" class="form-control" name="last_name" required value="{{ $viewProfile->user_detail->last_name }}">
                                </div>
                                <h6 class="sub-title my-3">State</h6>
                                <div class="input-group clockpicker " data-placement="bottom" data-align="top" data-autoclose="true">
                                    <input type="text" class="form-control" name="state" value="{{ $viewProfile->user_detail->state }}" required>
                                </div>
                                <h6 class="sub-title my-3">Gender</h6>
                                <select class="form-control" name="gender">
                                    <option value="">Select</option>
                                    <option value="Male" @if($viewProfile->user_detail->gender == 'Male') selected="" @endif>Male</option>
                                    <option value="Female" @if($viewProfile->user_detail->gender == 'Female') selected="" @endif>Female</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="my-2 py-1">Bio</label>
                            <div>
                                <textarea required="" class="form-control" rows="5" name="bio">{{ $viewProfile->user_detail->about_myself }}</textarea>
                            </div>
                        </div>
                        <br>
                        <div class="form-group mb-0">
                            <div>
                                <button type="submit" class="btn btn-primary waves-effect waves-light" name="add_profile" value="add_profile">
                                    Add profile
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
        $('#add_profile').parsley();

    });
</script>
@endsection
