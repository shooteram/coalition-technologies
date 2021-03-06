<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" value="{{ csrf_token() }}">

    <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
</head>
<body>
    <div id="app"></div>

    <script>
        window.Global = { "app_name": "{{ config('app.name') }}", "app_domain": "{{ config('app.url') }}" }
    </script>
    <script src="{{ mix('/js/app.js') }}"></script>
</body>
</html>
