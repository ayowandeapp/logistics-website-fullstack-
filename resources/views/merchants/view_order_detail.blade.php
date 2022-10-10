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
<script type="text/javascript">

</script>
<div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="btn-group float-right">
                        <ol class="breadcrumb hide-phone p-0 m-0">
                            <li class="breadcrumb-item"><a href="{{ url('/merchant/dashboard') }}">WanaBuy</a></li>
                            <li class="breadcrumb-item active">Order</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Order Number #{{ $orderDetails->order_number }}</h4>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
        <!-- end page title end breadcrumb -->

        <div class="row">
             <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="mt-0 header-title">Order Details</h4>
                        <table class="table">
                                                         
                            <tbody>
                            <tr>
                                <td>Order Date</td>
                                <td><?php echo date("F j, Y",strtotime($orderDetails->created_at)); ?></td>
                            </tr>
                            <tr>
                                <td>Order Status</td>
                                <td>
                                    @if($orderDetails->pickup_status == 'Shipped') 
                                        <span class="badge badge-boxed  badge-info">Shipped</span>
                                    @endif
                                    @if($orderDetails->pickup_status == 'Cancelled') 
                                        <span class="badge badge-boxed  badge-danger">Cancelled</span>
                                    @endif
                                    @if($orderDetails->pickup_status == 'New') 
                                        <span class="badge badge-boxed  badge-primary">New</span>
                                    @endif
                                    @if($orderDetails->pickup_status == 'In Process') 
                                        <span class="badge badge-boxed  badge-warning">In Process</span>
                                    @endif
                                    @if($orderDetails->pickup_status == 'Delivered') 
                                        <span class="badge badge-boxed  badge-success">Delivered</span>
                                    @endif
                                    @if($orderDetails->pickup_status == 'Recieved') 
                                        <span class="badge badge-boxed  badge-success">Recieved</span>
                                    @endif
                                    @if($orderDetails->pickup_status == 'Pending') 
                                        <span class="badge badge-boxed  badge-dark">Pending</span>
                                    @endif
                                    </td>
                            </tr>
                            <tr>
                                <td>Order Total</td>
                                <td>{{ $orderDetails->order_total }}</td>
                            </tr>
                            <tr>
                                <td>Shipping Charges</td>
                                <td>{{ $orderDetails->shipping_cost }}</td>
                            </tr>
                            <tr>
                                <td>Grand Total</td>
                                <td>{{ $orderDetails->grand_price }}</td>
                            </tr>
                            <tr>
                                <td>Payment Method</td>
                                <td>{{ $orderDetails->payment_method }}</td>
                            </tr>

                            </tbody>
                        </table>                
                    </div>            
               </div> <!-- end col --> 
                @if(Session::get('adminDetail')['admin'] == 1)
               <div class="card">
                    <div class="card-body">
                        <h4 class="mt-0 header-title">Update Order Status</h4>
                        <form action="{{ url('/order/updateStatus/'.$orderDetails->order_number) }}" method="post"> {{ csrf_field() }}
                            <select class="select2 form-control mb-3 custom-select select2-hidden-accessible" tabindex="-1" aria-hidden="true" name="updateStatus">
                                <option>Select</option>
                                <option value="New" @if($orderDetails->pickup_status == 'New') selected @endif>New</option>
                                <option value="Pending"  @if($orderDetails->pickup_status == 'Pending') selected @endif>Pending</option>
                                <option value="Cancelled" @if($orderDetails->pickup_status == 'Cancelled') selected @endif>Cancelled</option>
                                <option value="Shipped" @if($orderDetails->pickup_status == 'Shipped') selected @endif>Shipped</option>
                                <option value="In Process" @if($orderDetails->pickup_status == 'In Process') selected @endif>In Process</option>
                                <option value="Delivered" @if($orderDetails->pickup_status == 'Delivered') selected @endif>Delivered</option>
                                <option value="Recieved" @if($orderDetails->pickup_status == 'Recieved') selected @endif>Recieved</option>
                            </select>
                            <button type="submit" class="btn btn-outline-warning waves-effect waves-light">Update Status</button>
                        </form>               
                    </div>            
                </div> <!-- end col -->
                @endif
   
            </div>
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="mt-0 header-title">Customer Details</h4>
                        <table class="table">
                                                         
                            <tbody>
                            <tr>
                                <td>Customer Name</td>
                                <td>{{ $orderDetails->customer->first_name }} {{ $orderDetails->customer->last_name }}</td>
                            </tr>
                            <tr>
                                <td>Customer Email</td>
                                <td>{{ $orderDetails->customer->email }}</td>
                            </tr>
                            <tr>
                                <td>Customer Street</td>
                                <td>{{ $orderDetails->customer->street }}</td>
                            </tr>
                            <tr>
                                <td>Customer City</td>
                                <td>{{ $orderDetails->customer->city }}</td>
                            </tr>
                            <tr>
                                <td>Customer State</td>
                                <td>{{ $orderDetails->customer->state }}</td>
                            </tr>
                            <tr>
                                <td>Customer Phone No</td>
                                <td>{{ $orderDetails->customer->phone_no }}</td>
                            </tr>
                            <tr>
                                <td>Customer Alt Phone No</td>
                                <td>{{ $orderDetails->customer->alt_phone_no }}</td>
                            </tr>

                            </tbody>
                        </table>
                    </div>
               </div> <!-- end col -->      
            </div>
        </div><!-- end row --> 
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="mt-0 header-title">Package Detail(s)</h4>
                        <table class="table">
                            <thead class="thead-default">
                            <tr>
                                <th>#</th>
                                <th>Description</th>
                                <th>Unit Price</th>
                                <th>Quantity</th>
                                <th>Sub Total</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($orderDetails->package as $package)
                            <tr>
                                <th scope="row">1</th>
                                <td>{{ $package->description }}</td>
                                <td>{{ $package->unit_price }}</td>
                                <td>{{ $package->quantity }}</td>
                                <td>{{ $package->total_price }}</td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div> <!-- end col -->
        </div>
</div>
@endsection

@section('plugins')
<script src="{{ asset('js/backend_js/plugins/bootstrap-inputmask/bootstrap-inputmask.min.js') }}"></script>
@endsection
@section('pages')
<script type="text/javascript">
    //add more product field

   $(document).ready(function(){

}); 

</script>

@endsection
