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
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
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

<body>

<div class="nav-container container-fluid">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
    </div>
    <div class="navbar-collapse collapse">
        <span class="nav-item"><a class="nav-link" href="/">Send</a></span>
        <span class="separator">|</span>
        <span class="nav-item"><a class="nav-link" href="/search">Responses</a></span>
        <span class="separator">|</span>
        <span class="nav-item"><a class="nav-link nav-link-active" href="/facts">Facts</a></span>
    </div><!--/.nav-collapse -->
</div>
<!-- page content -->
@yield('content')
<!-- /page content -->
<footer>
    <p class="text-center" style="padding: 5px; color: white">© 2017 Send Star Wars.</p>
</footer>

<script type="text/javascript" src="{{ asset('assets/js/jquery-3-1.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/dataTables.bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/datatables.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/custom.js') }}"></script>
</body>
</html>