<?php
/**
 * Created by PhpStorm.
 * User: softy
 * Date: 29/09/20
 * Time: 02:16
 */
 use App\CustomerInfo; ?>

@extends('layouts/merchantLayout/merchant_design')

@section('content')
<style type="text/css">
    .remove{
        border-top-style: hidden;
        border-left-style: hidden;
        border-right-style: hidden;
    }
</style>
<script type="text/javascript">

</script>
<div class="container-fluid">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="page-title-box">
                                        <div class="btn-group float-right">
                                            <ol class="breadcrumb hide-phone p-0 m-0">
                                                <li class="breadcrumb-item"><a href="{{ url('/merchant/dashboard') }}">Wanamove</a></li>
                                                <li class="breadcrumb-item active"> view Merchants</li>
                                            </ol>
                                        </div>
                                        <h4 class="page-title">View Merchants</h4>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <!-- end page title end breadcrumb -->
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <table id="datatable" class="table table-bordered">
                                                <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Merchant</th>
                                                    <th>Admin</th>
                                                    <th>Created at</th>
                                                    <th>Action</th>
                                                </tr>
                                                </thead>
            
            
                                                <tbody>
                                                @foreach($allMerchant as $merchant)
                                                <tr>
                                                    <td>{{ $merchant->userDetail->first_name }} {{ $merchant->userDetail->last_name }}</td>
                                                    <td>{{ $merchant->email }}</td>
                                                    <td>@if($merchant->merchant == 0)
                                                    <span style="color: red;">InActive</span>
                                                    @else
                                                    <span style="color: green;">Active</span>
                                                    @endif
                                                    
                                                    @if($merchant->id != Auth::user()->id)
                                                    |<a href="{{ url('/merchant/status/'.$merchant->id) }}">change</a>
                                                    @endif
                                                    </td>
                                                    <td>@if($merchant->admin == 0)
                                                    <span style="color: red;">No</span>
                                                    @else
                                                    <span style="color: green;">Yes</span>
                                                    @endif
                                                    
                                                    @if($merchant->id != Auth::user()->id)
                                                    |<a href="{{ url('/merchant/adminstatus/'.$merchant->id) }}">change</a>
                                                    @endif
                                                    </td>
                                                    <td><?php echo date("F j, Y",strtotime($merchant->updated_at)); ?></td>
                                                    <td><button type="button" class="btn btn-primary waves-effect waves-light btn-sm" id="alertify-confirm">Click me</button></td>
                                                </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
            
                                        </div>
                                    </div>
                                </div> <!-- end col -->
                            </div> <!-- end row -->           
                            

                        </div><!-- container -->
@endsection

@section('plugins')
<script src="{{ asset('js/backend_js/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('js/backend_js/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>

<script src="{{ asset('js/backend_js/plugins/datatables/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('js/backend_js/plugins/datatables/responsive.bootstrap4.min.js') }}"></script>
<!--
<script src="{{ asset('js/backend_js/plugins/alertify/js/alertify.js') }}"></script>
<script src="{{ asset('js/backend_js/pages/alertify-init.js') }}"></script>
 Datatable init js -->
<script src="{{ asset('js/backend_js/plugins/datatables/datatables.init.js') }}"></script> 
        
@endsection
@section('pages')
<script type="text/javascript">
    //add more product field

   $(document).ready(function(){
    



});
   

</script>

@endsection
