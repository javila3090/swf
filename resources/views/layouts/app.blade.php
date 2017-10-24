<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta property="og:url"           content="{{Request::url()}}" />
    <meta property="og:type"          content="website" />
    <meta property="og:title"         content="Star Wars Facts " />
    <meta property="og:description"   content="Send anom facts" />
    <meta property="og:image"         content="" />
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
        <span class="nav-item"><a class="nav-link {{ Request::is('/') ? 'active' : '' }}" href="/">Send</a></span>
        <span class="separator">|</span>
        <span class="nav-item"><a class="nav-link {{ Request::is('search') ? 'active' : '' }}" href="/search">Responses</a></span>
        <span class="separator">|</span>
        <span class="nav-item"><a class="nav-link {{ Request::is('facts') ? 'active' : '' }}" href="/facts">Facts</a></span>
    </div><!--/.nav-collapse -->
</div>
<!-- page content -->
@yield('content')
<!-- /page content -->
<footer class="container footer">
    <div class="row">
        <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-8 col-xs-offset-2">
            <p class="small-title" style="font-size: 28px !important;">Common Questions</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3 col-sm-3 col-xs-6 text-center">
            <p class="small-title">Is this for real?</p>
            <p>Yes! Tap here to test it out. We believe everyone should bask in the glory that is Cat Facts!</p>
        </div>
        <div class="col-md-3 col-sm-3 col-xs-6 text-center">
            <p class="small-title">Why does it cost money?</p>
            <p>Because text messages cost money and we're not paying for you to prank your friends.</p>
        </div>
        <div class="col-md-3 col-sm-3 col-xs-6 text-center">
            <p class="small-title">When will the texts send?</p>
            <p>All texts are sent out on a fixed schedule, so you may have to wait up to 15 minutes.</p>
        </div>
        <div class="col-md-3 col-sm-3 col-xs-6 text-center">
            <p class="small-title">When will the texts send?</p>
            <p>All texts are sent out on a fixed schedule, so you may have to wait up to 15 minutes.</p>
        </div>
    </div>
    <br>
    <div class="row">
        <p class="text-center" style="color: white;">© 2017 Send Star Wars Facts</p>
    </div>
</footer>

<script type="text/javascript" src="{{ asset('assets/js/jquery-3-1.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/dataTables.bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/datatables.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/mask.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/custom.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/facebook.js') }}"></script>
</body>
</html>