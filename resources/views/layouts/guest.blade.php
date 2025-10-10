<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title> {{session('site_settings')['site_title']['title'] ?? env('APP_NAME')}} </title>

        <!-- Vendor css -->
        <link href="{{asset('/css/vendor.min.css')}}" rel="stylesheet" type="text/css" />

        <!-- App css -->
        <link href="{{asset('/css/app.min.css')}}" rel="stylesheet" type="text/css" id="app-style" />

        <!-- Icons css -->
        <link href="{{asset('/css/icons.min.css')}}" rel="stylesheet" type="text/css" />

        <!-- Theme Config Js -->
        <script src="{{asset('/js/config.js')}}"></script>
    </head>
    <body>
        
        {{ $slot }}

        <!-- Vendor js -->
        <script src="{{asset('/js/vendor.min.js')}}"></script>

        <!-- App js -->
        <script src="{{asset('/js/app.js')}}"></script>
    </body>
</html>
