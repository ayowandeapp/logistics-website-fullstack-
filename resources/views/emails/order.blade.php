<html>
<head>
    <title>Order Review</title>
</head>
<body>
<table width="700px">
    <tr>
        <td> </td>
    </tr>
    <tr><td><img src="{{ asset('images/frontend_images/home/logo.png') }}"> </td></tr>
    <tr><td>&nbsp;</td></tr>
    <tr><td>Hello: {{ $name }}</td></tr>
    <tr>
        <td>
            Thank you for shopping with us. your order details are as below:
        </td>
    </tr>
    <tr><td>&nbsp;</td></tr>
    <tr><td>Order No: {{ $order_id }}</td></tr>
    <tr><td>&nbsp;</td></tr>
    <tr><td>
            <table  width="95%" cellpadding="5" cellspacing="5" bgcolor="#f7f4f4">
                <tr bgcolor="#cccccc">
                    <td>Item Description</td>
                    <td>Unit Price</td>
                    <td>Quantity</td>
                    <td>Sub Total</td>
                </tr>

                @foreach($orderDetails as $product)
                <tr>
                    <td>{{ $product->description }}</td>
                    <td>{{ $product->unit_price }}</td>
                    <td>{{ $product->quantity }}</td>
                    <td>{{ $product->total_price }}</td>
                </tr>
                @endforeach
                <tr>
                    <td colspan="5" align="right">Total</td>
                    <td>{{ $orderPackage->order_total }}</td>
                </tr>
                <tr>
                    <td colspan="5" align="right">Shipping Charges</td>
                    <td>{{ $orderPackage->shipping_cost }}</td>
                </tr>
                <tr>
                    <td colspan="5" align="right">Grand Total</td>
                    <td>{{ $orderPackage->grand_price }}</td>
                </tr>
            </table>
    </td></tr>
    <tr><td>
            <table width="100%">
                <tr>
                    <td width="100%">
                        <table>
                            <tr>
                                <td><strong>Customer Details:</strong></td>
                            </tr>
                            <tr>
                                <td>{{ $customerDetails->first_name }} {{ $customerDetails->last_name }}</td>
                            </tr>
                            <tr>
                                <td>{{ $customerDetails->street }}, {{ $customerDetails->city }}, {{ $customerDetails->state }}</td>
                            </tr>
                            <tr>
                                <td>{{ $customerDetails->phone_no }}</td>
                            </tr>
                            <tr>
                                <td>{{ $customerDetails->alt_phone_no }}</td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
    </td></tr>
    <tr><td>&nbsp;</td></tr>
    <tr><td>For any enquires, you can contact us at <a href="mailto:ayooluwa71@gmail.com">ayooluwa71@gmail.com</a> </td></tr>
    <tr><td>&nbsp;</td></tr>
    <tr><td>WanaBuy Website</td></tr>
</table>
</body>

</html>