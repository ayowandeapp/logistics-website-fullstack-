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
                    <li class="breadcrumb-item"><a href="{{ url('/merchant/dashboard') }}">Wanamove</a></li>
                    <li class="breadcrumb-item active">Order</li>
                </ol>
            </div>
            <h4 class="page-title">Order List</h4>
        </div>
    </div>
    <div class="clearfix"></div>
</div>
<!-- end page title end breadcrumb -->


<div class="row">
     <div class="col-12">
        <div class="card">
            <div class="card-body">                  
                        <ul class="list-inline mb-0">
                            <!-- language-->
                            <li class="list-inline-item app-search">
                                <form role="search" method="post" action="{{ url('/order/search') }}">{{ csrf_field() }}
                                    <input type="text" name="searchTxt" placeholder="Search by order number or client name" class="form-control" style="width: 500px">
                                    <a href="javascript:void(0);" onclick="$(this).closest('form').submit();" style="margin-left: 300px;"><i class="fa fa-search" ></i></a>
                                </form>
                            </li>
                            <li class="list-inline-item app-search">
                                <form role="search" method="post" action="{{ url('/search-filter') }}">{{ csrf_field() }}
                                        <select name="statusFilter[]" class="custom-select form-control" id="inputGroupSelect04" style="width: 150px;" onchange="$(this).closest('form').submit();"><i class="fa fa-angle-down"></i>
                                            <option selected="">Filter by status</option>
                                            @foreach($searchFilters as $filter)
                                            <option value="{{ $filter }}">{{ $filter }}</option>
                                            @endforeach
                                        </select>
                                </form>
                            </li>
                        </ul>
                <br>
                <!-- second form -->
                @if(empty($allPackage))
                    <h6>No Order Found</h6>
                @endif
                @foreach($allPackage as $package)
                <?php
                    $customer = CustomerInfo::where(['order_number'=>$package->order_number])->first();
                 ?>
                <div class="row" style="background-color: #e0e0e0; border-radius: 10px;">
                    <div class="col-md-12">
                        <div class="p-0">
                             <section style="background-color: #d8d8d8; padding-top: 1px; border-radius: 10px;">

                                <ul style="list-style-type: none; margin-left: -25px">
                                    <li>
                                        <h6>#{{ $package->order_number }}</h6>
                                    </li>
                                    <li style="margin-top: -10px;">
                                        <p>{{  $customer->first_name }} {{  $customer->last_name }}. <span style="color: #4747a4;">{{  $customer->phone_no }}  . {{  $customer->email }}</span></p>
                                    </li>
                                </ul>            
                                 <a type="button" class="btn btn-outline-info waves-effect waves-light" style="float: right;margin-top: -35px;" href="{{ url('/merchant/view-order/'.$package->order_number) }}">Info</a>
                             </section>
                             <div>
                                  <table name="cart" style="width: 100%">                                
                                <tr>
                                    <th >Package</th>                    
                                    <th>Status</th>
                                    <th>Payment Type</th>
                                    <th>Total Amount</th>
                                    <th>Last Updated</th>
                                </tr>
                                <tr name="line_items">
                                 <td>#{{ $package->order_number }}</td>                                        
                                 <td>
                                 @if($package->pickup_status == 'Shipped') 
                                        <span class="badge badge-boxed  badge-info">Shipped</span>
                                    @endif
                                    @if($package->pickup_status == 'Cancelled') 
                                        <span class="badge badge-boxed  badge-danger">Cancelled</span>
                                    @endif
                                    @if($package->pickup_status == 'New') 
                                        <span class="badge badge-boxed  badge-primary">New</span>
                                    @endif
                                    @if($package->pickup_status == 'In Process') 
                                        <span class="badge badge-boxed  badge-warning">In Process</span>
                                    @endif
                                    @if($package->pickup_status == 'Delivered') 
                                        <span class="badge badge-boxed  badge-success">Delivered</span>
                                    @endif
                                    @if($package->pickup_status == 'Recieved') 
                                        <span class="badge badge-boxed  badge-success">Recieved</span>
                                    @endif
                                    @if($package->pickup_status == 'Pending') 
                                        <span class="badge badge-boxed  badge-dark">Pending</span>
                                    @endif

                                 </td>
                                 <td>{{ $package->payment_method}}</td>                        
                                 <td>{{ $package->grand_price }}</td>
                                 <td><?php echo date("F j, Y",strtotime($package->updated_at)); ?></td>
                                 <td></td>                                        
                                </tr>
                            </table>
                             </div>

                            
                        </div>
                    </div>
                </div>
                <br>
                @endforeach
                <br>
                {{ $allPackage->links('pagination') }}
                    
                </div>
                
            </div>
            
       </div> <!-- end col -->      
    </div>
</div><!-- end row --> 
@endsection

@section('plugins')
@endsection
@section('pages')

@endsection
