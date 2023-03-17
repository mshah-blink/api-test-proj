<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Payments</title>

    <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
    <script src="https://gateway2.blinkpayment.co.uk/sdk/web/v1/js/hostedfields.min.js"></script>
    <script src="https://api-demo-php.blinkpayment.co.uk/assets/js/blink-host.js"></script>
</head>

<body class="antialiased">
    <form method="POST" action="process" id="test">
        @csrf

        {!! $element !!}
        <input type="hidden" id="raw_amount" name="raw_amount" value="{{ $rawAmount }}" />
        <input type="hidden" id="transaction_unique" name="transaction_unique" value="{{ $transactionUnique }}" />
        @isset($type)
            <input type="hidden" id="type" name="type" value="{{ $type }}" />
            @if ($type == 1)
                <input type="hidden" id="device_timezone" name="device_timezone" value="0" />
                <input type="hidden" id="device_capabilities" name="device_capabilities" value="javascript" />
                <input type="hidden" id="device_accept_language" name="device_accept_language" value="en-GB" />
                <input type="hidden" id="device_screen_resolution" name="device_screen_resolution" value="1366x768x24" />
                <input type="hidden" id="remote_address" name="remote_address" value="120.123.145.178" />
            @endif
        @endisset

        <input type="hidden" id="method" name="method" value="{{ $method }}" />
        <br />
        <button type="submit">Submit</button>
    </form>
</body>

</html>
