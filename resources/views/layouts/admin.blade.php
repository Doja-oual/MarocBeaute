<!DOCTYPE html>

<html lang="{{ str_replace('_','-',app()->getLocale()) }}">

<head >
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name=""csrf-tolen content="{{ csrf_token()}}">

    <title >{{ config('app.name','admin')} }</title>
    <link href="{{ asset('admin/css/styles.css')}}" rel="stylesheet">

</head>
<body>


</body>
</html>