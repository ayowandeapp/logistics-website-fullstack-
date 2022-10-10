<html>
<head>
    <title>Register Email</title>
</head>
<body>
<table>
    <tr>
        <td> Dear {{ $name }}</td>
    </tr>
    <tr><td>&nbsp;</td></tr>
    <tr>
        <td>
            Your account as been successfully activated. your login details is as below:
        </td>
    </tr>
    <tr><td>&nbsp;</td></tr>
    <tr><td><a href="{{ url('confirm/'.$code) }}">Confirm Account</a></td></tr>
    <tr><td>&nbsp;</td></tr>
    <tr><td>Thanks & Regards</td></tr>
    <tr><td>Shopping Website</td></tr>
</table>
</body>

</html>