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
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="btn-group float-right">
                    <ol class="breadcrumb hide-phone p-0 m-0">
                        <li class="breadcrumb-item"><a href="#">Merchant</a></li>
                        <li class="breadcrumb-item"><a href="#">Profile</a></li>
                        <li class="breadcrumb-item active">View profile</li>
                    </ol>
                </div>
                <h4 class="page-title">Profile</h4>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
    <!-- end page title end breadcrumb -->
    <div class="row">

        <div class="col-12">

            <div class="card">
                <div class="card-body">
                    <a class="mt-0 header-title float-right" href="{{ url('/merchant/edit_profile') }}"><button type="button" class="btn btn-primary btn-sm waves-effect waves-light" name="edit_profile" value="edit_profile">
                            Edit profile
                        </button></a>
                    <h4 class="mt-0 header-title">Merchant Information</h4> <p class="text-muted mb-4 font-14"></p>

                    <dl class="row mb-0">
                        <dt class="col-sm-3">First name</dt>
                        <dd class="col-sm-9">{{ $viewProfile->user_detail->first_name }}</dd>

                        <dt class="col-sm-3">Last name</dt>
                        <dd class="col-sm-9">{{ $viewProfile->user_detail->last_name }}</dd>

                        <dt class="col-sm-3">Gender</dt>
                        <dd class="col-sm-9">{{ $viewProfile->user_detail->gender }}</dd>

                        <dt class="col-sm-3">Date of Birth</dt>
                        <dd class="col-sm-9">{{ $viewProfile->user_detail->dob }}</dd>

                        <dt class="col-sm-3">State</dt>
                        <dd class="col-sm-9">{{ $viewProfile->user_detail->state }}</dd>

                        <dt class="col-sm-3">Country</dt>
                        <dd class="col-sm-9">{{ $viewProfile->user_detail->country }}</dd>

                        <dt class="col-sm-3">Bio</dt>
                        <dd class="col-sm-9">{{ $viewProfile->user_detail->about_myself }}</dd>
                    </dl>

                </div>
            </div>

        </div> <!-- end col -->
    </div> <!-- end row -->

</div><!-- container -->
@endsection

@section('plugins')

@endsection
@section('pages')

@endsection
