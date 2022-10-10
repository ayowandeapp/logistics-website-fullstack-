<html>
<head>
    <title>{{ $subject }}</title>
</head>
<body>
<table>
<tr>
        <td> From {{ $email }}</td>
    </tr>
    <tr>
        <td> Dear {{ $name }}</td>
    </tr>
    <tr><td>&nbsp;</td></tr>
    <tr>
        <td>
            {{ $detail }}
        </td>
    </tr>
    <tr><td>&nbsp;</td></tr>
    <tr><td>Thanks & Regards</td></tr>
</table>
</body>

</html>