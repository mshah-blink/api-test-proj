<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Payments</title>
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
    <script src="https://gateway2.blinkpayment.co.uk/sdk/web/v1/js/hostedfields.min.js"></script>
    <script src="https://api-demo-php.blinkpayment.co.uk/assets/js/blink-host.js"></script>
    <link rel="stylesheet" href="{{ asset('style.css') }}">
</head>

<body class="antialiased">
    <form method="POST" action="process" id="test">
        @csrf
        {!! $element !!}
        <input type="hidden" id="merchant_data" name="merchant_data" value="{\"order_id\": \"12345\"}" />
        <button type="submit">Submit</button>
    </form>
</body>

</html>
