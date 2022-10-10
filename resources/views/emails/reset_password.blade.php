<html>
<head>
    <title>Reset Password</title>
</head>
<body>
<table>
    <tr>
        <td> Dear {{ $name }}</td>
    </tr>
    <tr><td>&nbsp;</td></tr>
    <tr>
        <td>
            You forgot your password. pls reset by following the link as below:
        </td>
    </tr>
    <tr><td>&nbsp;</td></tr>
    <tr><td><a href="{{ url('password/resetPassword/'.$token.'?email='.urlencode($email)) }}">Reset Account Password</a></td></tr>
    <tr><td>&nbsp;</td></tr>
    <tr><td>Thanks & Regards</td></tr>
    <tr><td>WannaMove Website</td></tr>
</table>
</body>

</html>