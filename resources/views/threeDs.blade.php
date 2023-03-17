<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>3DS</title>
    <script>
        onload = () => document.forms[0].submit();
    </script>
</head>

<body class="antialiased">
    {!! $element !!}
</body>

</html>
