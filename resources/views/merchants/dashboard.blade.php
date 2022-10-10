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
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </div>
            <h4 class="page-title">Dashboard</h4>
        </div>
    </div>
    <div class="clearfix"></div>
</div>
<!-- end page title end breadcrumb -->
<div class="row">
    <div class="col-xl-8">
        <div class="row">

            <div class="col-lg-5">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-row">
                            <div class="col-3 align-self-center">
                                <div class="round">
                                    <i class="mdi mdi-account-multiple-plus"></i>
                                </div>
                            </div>
                            <div class="col-9 text-right align-self-center">
                                <div class="m-l-10 ">
                                    <h5 class="mt-0">{{ $userCount }}</h5>
                                    <p class="mb-0 text-muted">Total Users</p>
                                </div>
                            </div>
                        </div>
                    </div><!--end card-body-->
                </div><!--end card-->
            </div><!--end col-->

            <div class="col-lg-5">
                <div class="card">
                    <div class="card-body">
                        <div class="search-type-arrow"></div>
                        <div class="d-flex flex-row">
                            <div class="col-3 align-self-center">
                                <div class="round ">
                                    <i class="mdi mdi-cart"></i>
                                </div>
                            </div>
                            <div class="col-9 align-self-center text-right">
                                <div class="m-l-10 ">
                                    <h5 class="mt-0">{{ $orderCount }}</h5>
                                    <p class="mb-0 text-muted">Total Orders</p>
                                </div>
                            </div>
                        </div>
                    </div><!--end card-body-->
                </div><!--end card-->
            </div><!--end col-->
        </div><!--end row-->
</div><!--end row-->
<div class="row">
    <div class="col-xl-12">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                    <h3>Chart of number of order</h3>
                    </div><!--end card-body-->
                </div><!--end card-->
            </div><!--end col-->
        </div><!--end row-->
</div>

</div>
@endsection

@section('plugins')
<script src="{{ asset('js/backend_js/plugins/jvectormap/jquery-jvectormap-2.0.2.min.js') }}"></script>
<script src="{{ asset('js/backend_js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>

<script src="{{ asset('js/backend_js/plugins/skycons/skycons.min.js') }}"></script>
<script src="{{ asset('js/backend_js/plugins/fullcalendar/vanillaCalendar.js') }}"></script>

<script src="{{ asset('js/backend_js/plugins/raphael/raphael-min.js') }}"></script>
<script src="{{ asset('js/backend_js/plugins/morris/morris.min.js') }}"></script>
@endsection
@section('pages')
<script src="{{ asset('js/backend_js/pages/dashboard.js') }}"></script>
@endsection
