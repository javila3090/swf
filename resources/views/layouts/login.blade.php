<?php
/**
 * Created by PhpStorm.
 * User: Julio
 * Date: 16/10/2017
 * Time: 03:36 PM
 */
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Star Wars Facts </title>
    <link rel="shortcut icon" href="{{  URL::asset('assets/images/sw.ico') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/custom.css') }}">
    <!-- scripts -->
    <script>
        window.Laravel =
        <?php echo
        json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>

<body class="secure">

<!-- page content -->
@yield('content')
<!-- /page content -->
<footer class="container footer" style="padding-top: 80px;">
    <div class="row">
        <p class="text-center" style="color: black;">© 2017 Send Star Wars Facts</p>
    </div>
</footer>

<script type="text/javascript" src="{{ asset('assets/js/jquery-3-1.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/dataTables.bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/datatables.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/mask.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/custom.js') }}"></script>
</body>
</html>
