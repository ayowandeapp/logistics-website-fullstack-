<?php
/**
 * Created by PhpStorm.
 * User: softy
 * Date: 29/09/20
 * Time: 02:16
 */ ?>

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
                    <li class="breadcrumb-item"><a href="{{ url('/merchant/dashboard') }}">WanaMove</a></li>
                    <li class="breadcrumb-item active">Add Order</li>
                </ol>
            </div>
            <h4 class="page-title">PickUp</h4>
        </div>
    </div>
    <div class="clearfix"></div>
</div>
<!-- end page title end breadcrumb -->


<div class="row">
     <div class="col-12">
        <div class="card">
            <div class="card-body">
                @if($errors->any())
                        <div>
                        <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                        </ul>
                        </div>
                @endif
                <form action="{{ url('/merchant/pickup') }}" method="post" name="pickUpForm" id="pickUpForm"> {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="p-20">
                                    <div class="form-group">
                                        <label>Payment Type</label>
                                        <select class="select2 form-control mb-3 custom-select remove"  name="Payment_type" id="payment_type">
                                            <option>Select</option>
                                            <option value="COD">COD</option>
                                            <option value="Prepaid">Prepaid</option>
                                        </select>
                                    </div>
                                   <h4  class="mt-0 header-title">Customer Info</h4> 
                                    <div class="form-group">
                                        <label>First name*</label>
                                        <input type="text" class="form-control remove" placeholder="Type something" name=" first_name" required value="{{ old('first_name') }}">
                                    </div>
                                    <div class="form-group">
                                        <label>State*</label>
                                        <input type="text" class="form-control remove" placeholder="Type something" name="state" required value="{{ old('state') }}">
                                    </div>
                                    <div class="form-group">
                                        <label>Street*</label>
                                        <input type="text" class="form-control remove" required placeholder="Type something" name="street"  value="{{ old('street') }}">
                                    </div>
                                    <div class="form-group m-b-0">
                                        <label>Phone number*</label>
                                        <input type="text" placeholder="" data-mask="(999) 999-9999" class="form-control remove" name="phone" required value="{{ old('phone') }}">
                                        <span class="font-13 text-muted">(999) 999-9999</span>
                                    </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="p-20">
                                    <div class="form-group">
                                        <label>Order Number*</label>
                                       <input type="text" class="form-control remove" required placeholder="Type something" name="order_number" value="{{ old('order_number') }}">
                                    </div>
                                    <div class="form-group">
                                        <label style="margin-top: 48px; ">Last name*</label>
                                        <input type="text" class="form-control remove" required placeholder="Type something" name="last_name" value="{{ old('last_name') }}">
                                    </div>
                                    <div class="form-group">
                                        <label>Local Government Area*</label>
                                        <input type="text" class="form-control remove" required placeholder="Type something" name="govern" value="{{ old('govern') }}">
                                    </div>
                                    <div class="form-group">
                                        <label>Email address*</label>
                                        <input type="text" class="form-control remove" required placeholder="Type something" name="email" value="{{ old('email') }}">
                                    </div>
                                    <div class="form-group m-b-0">
                                        <label>Alternative phone number*</label>
                                        <input type="text" placeholder="" data-mask="(999) 999-9999" class="form-control remove" name="alt_phone" required value="{{ old('alt_phone') }}">
                                        <span class="font-13 text-muted">(999) 999-9999</span>
                                    </div>
                            </div>
                        </div> <!-- end col -->
                    </div> <!-- end row -->
                <!-- second form -->
                    <div class="row" style="overflow-x: auto;">
                            <h4  class="mt-0 header-title">Package Details</h4>
                            <table name="cart" width="100%">
                                <tbody id="added">
                                    <tr>
                                        <th>Description*</th>                    
                                        <th>Quantity*</th>
                                        <th>Unit Price*</th>
                                        <th>Item Total</th>
                                        <th></th>
                                    </tr>
                                    <tr name="line_items">
                                        <td><input class="remove" required type="text" name="desc[]" id="description" placeholder="Description" /></td>
                                        <td><input style="border-top-style: hidden; border-left-style: hidden; border-right-style: hidden;" class="qty" required type="text" name="qty[]" placeholder="Quantity"></td>
                                        <td><input style="border-top-style: hidden; border-left-style: hidden; border-right-style: hidden;" type="text" name="price[]" class="price" required placeholder="Unit Price"></td>                        
                                        <td><input style="border-top-style: hidden; border-left-style: hidden; border-right-style: hidden;" type="text" class="item_total" name="item_total" placeholder="NGN" jAutoCalc="{qty} * {price}"></td>
                                        <td style=""><a  href="javascript:void(0);" class="add_button" title="Add-field" >Add</a></td>
                                    </tr>
                                </tbody>
                            </table>
                    </div>
                <br>
                <div class="row">
                    <table width="100%">
                        <tr>
                            <td colspan="4" align="right"><input required type="text" class="shipping_cost" name="shipping_cost" id="shipping_cost" placeholder="Shipping Cost" style="width: 100px; border-top-style: hidden; border-left-style: hidden; border-right-style: hidden;" /></td>
                        </tr>
                    </table>              
                </div>
                <div class="row" style="background-color: #ededed; margin-top: 10px; margin-bottom: 10px;">
                    <table width="100%">
                        <tr>
                            <td colspan="4" align="right" style="width: 100%;">Sub Total:<input type="text" class="sub_total" name="sub_total" value="" jAutoCalc="SUM({item_total})" style="background-color: #ededed; border-bottom-style: hidden; border-top-style: hidden; border-left-style: hidden; border-right-style: hidden; width: 70px;"></td>
                        </tr>
                        <tr>
                            <td colspan="4" align="right">Shipping Cost:<span name="show_shipping_cost" id="show_shipping_cost" style="margin-right: 15px;">0.00</span></td>
                        </tr>
                        <tr>
                            <td colspan="4" align="right" style="">Total:<input type="text" class="grand_total" name="grand_total" value="" jAutoCalc="{sub_total} + {shipping_cost}" style="background-color: #ededed; border-bottom-style: hidden; border-top-style: hidden; border-left-style: hidden; border-right-style: hidden; width: 100px;"> </td>
                        </tr>
                    </table>          
                </div>
                <div>
                    <button type="submit" class="btn btn-primary waves-effect waves-light" id="alertify-success">
                        Submit
                    </button>
                    <button type="reset" class="btn btn-secondary waves-effect m-l-5">
                        Cancel
                    </button>
                </div>

                </form> 

                
            </div>
            
       </div> <!-- end col -->      
    </div>
</div><!-- end row --> 
@endsection

@section('plugins')
<script src="{{ asset('js/backend_js/plugins/bootstrap-inputmask/bootstrap-inputmask.min.js') }}"></script>
<script src="{{ asset('js/backend_js/jautocalc.js') }}"></script>
@endsection
@section('pages')
<script type="text/javascript">
    //add more product field

   $(document).ready(function(){
    function autoCalcSetup() {
                    $('form[name=pickUpForm]').jAutoCalc('destroy');
                    $('form[name=pickUpForm] tr[name=line_items]').jAutoCalc({keyEventsFire: true, decimalPlaces: 2, emptyAsZero: true});
                    $('form[name=pickUpForm]').jAutoCalc({decimalPlaces: 2});
                }
                autoCalcSetup();
                function getPrice(){
                    $("input[type='text'][name^='price']").each(function(){
                         alert(this.value)
       
    })
                }
    var maxField = 10; //input field increment limitation
    var addButton = $('.add_button'); //Add button selector
    var wrapper = $('#added'); //input Field wrapper
    var fieldHTML = '<tr name="line_items"><td><input class="remove" required type="text" name="desc[]" id="description" placeholder="Description" /></td><td><input style="border-top-style: hidden; border-left-style: hidden; border-right-style: hidden;" class="qty" required type="text" name="qty[]" value="" placeholder="Quantity"></td><td><input type="text" style="border-top-style: hidden; border-left-style: hidden; border-right-style: hidden;" name="price[]" value="" class="price" required placeholder="Unit Price"></td><td><input type="text" style="border-top-style: hidden; border-left-style: hidden; border-right-style: hidden;" class="item_total" name="item_total[]" placeholder="NGN" jAutoCalc="{qty} * {price}"></td><td><a href="javascript:void(0);" class="remove_button" title="Remove field">Remove</a></td> </tr>'; //new input field html
    var x=1;//initial field counter is 1
    $(addButton).click(function(){
        if(x < maxField){// once add button is clicked
            x++; //increment field
            $(wrapper).append(fieldHTML).jAutoCalc('destroy'); //add field html
            autoCalcSetup();
            //getPrice();
        }
    });
    $(wrapper).on('click', '.remove_button', function(e){//once removed button is clicked
        e.preventDefault();
        $(this).parents('tr').remove();//Remove field html
        x--;//decrement field counter

    });
    $('#shipping_cost').keyup(function(){
        var shipping_cost = $('#shipping_cost').val();
        //alert(shipping_cost);
        $("#show_shipping_cost").html(shipping_cost);
        
    });
});
   

</script>

@endsection
