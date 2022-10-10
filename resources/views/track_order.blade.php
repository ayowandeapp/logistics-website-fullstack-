<?php
/**
 * Created by PhpStorm.
 * User: softy
 * Date: 29/09/20
 * Time: 02:16
 */
 ?>

@extends('layouts/frontendLayout/frontend_design')
@section('content')
<script type="text/javascript">

</script>
<div class="tm-section tm-bg-img" style="background-color: #121423;">
    <div class="tm-bg-white container-fluid ">
        <div class="row" style="margin-top: 20px;">
             <div class="col-lg-6 col-md-6">
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
             </div>
            <div class="col-lg-6 col-md-6">
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
        <div class="row" style="margin-top: 10px;">
            <div class="col-12">
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
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($orderDetails->package as $package)
                            <tr>
                                <th scope="row">1</th>
                                <td>{{ $package->description }}</td>
                                <td>{{ $package->unit_price }}</td>
                                <td>{{ $package->quantity }}</td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div> <!-- end col -->
        </div>
    </div>
</div>
@endsection
