<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Payment</title>
</head>

<body class="antialiased">
    <ul class="mt-4">
        <li><a href="{{ url('/cc_payment') }}">CC</a></li>
        <li><a href="{{ url('/cc_3ds_payment') }}">CC (3DS)</a></li>
        <li><a href="{{ url('/ob_payment') }}">OB</a></li>
        <li><a href="{{ url('/dd_payment') }}">DD</a></li>
    </ul>
</body>

</html>
