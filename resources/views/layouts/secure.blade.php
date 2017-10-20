<?php
/**
 * Created by PhpStorm.
 * User: Julio
 * Date: 16/10/2017
 * Time: 04:38 PM
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
    <title>Send Star Wars Facts </title>
    <link rel="stylesheet" href="{{ URL::asset('assets/template/vendors/bootstrap/dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/template/vendors/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/template/vendors/nprogress/nprogress.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/template/vendors/iCheck/skins/flat/green.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/template/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/template/vendors/jqvmap/dist/jqvmap.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/template/vendors/bootstrap-daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/template/build/css/custom.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/datatables.min.css') }}">
    <!-- scripts -->
    <script>
        window.Laravel =
        <?php echo
        json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>

<body class="nav-md">
<div class="container body">
    <div class="main_container">
        <div class="col-md-3 left_col">
            <div class="left_col scroll-view">
                <div class="navbar nav_title" style="border: 0;">
                    <a href="index.html" class="site_title"><i class="fa fa-user"></i> <span>ADMIN AREA</span></a>
                </div>

                <div class="clearfix"></div>

                <!-- menu profile quick info
                <div class="profile clearfix">
                    <div class="profile_pic">
                        <img src="assets/template/production/images/img.jpg" alt="..." class="img-circle profile_img">
                    </div>
                    <div class="profile_info">
                        <span>Welcome,</span>
                        <h2>{{ Auth::user()->name }}</h2>
                    </div>
                </div>
                <!-- /menu profile quick info -->

                <br />

                <!-- sidebar menu -->
                <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                    <div class="menu_section">
                        <h3>General</h3>
                        <ul class="nav side-menu">
                            <li><a href="{{url('secure/home')}}"><i class="fa fa-home"></i> Home </a>
                            <li><a><i class="fa fa-bar-chart"></i> Stadistics  <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="index.html">Dashboard</a></li>
                                    <li><a href="index2.html">Dashboard2</a></li>
                                    <li><a href="index3.html">Dashboard3</a></li>
                                </ul>
                            </li>
                            <li><a><i class="fa fa-edit"></i> Orders <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="form.html">New Orders</a></li>
                                    <li><a href="form_advanced.html"></a></li>
                                    <li><a href="form_validation.html">Form Validation</a></li>
                                    <li><a href="form_wizards.html">Form Wizard</a></li>
                                    <li><a href="form_upload.html">Form Upload</a></li>
                                    <li><a href="form_buttons.html">Form Buttons</a></li>
                                </ul>
                            </li>
                            <li><a href="{{route('list_facts')}}"><i class="fa fa-send-o"></i> Facts <span class="fa fa-chevron-left"></span></a>

                            </li>

                            <!--<li><a href="javaasset:void(0)"><i class="fa fa-laptop"></i> Landing Page <span class="label label-success pull-right">Coming Soon</span></a></li>-->
                        </ul>
                    </div>

                </div>
                <!-- /sidebar menu -->

                <!-- /menu footer buttons -->
                <div class="sidebar-footer hidden-small">
                    <a data-toggle="tooltip" data-placement="top" title="Settings">
                        <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                    </a>
                    <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                        <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                    </a>
                    <a data-toggle="tooltip" data-placement="top" title="Lock">
                        <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
                    </a>
                    <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
                        <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                    </a>
                </div>
                <!-- /menu footer buttons -->
            </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
            <div class="nav_menu">
                <nav>
                    <div class="nav toggle">
                        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                    </div>

                    <ul class="nav navbar-nav navbar-right">
                        <li class="">
                            <a href="javaasset:" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                <img src="assets/template/production/images/img.jpg" alt="">{{ Auth::user()->name }}
                                <span class=" fa fa-angle-down"></span>
                            </a>
                            <ul class="dropdown-menu dropdown-usermenu pull-right">
                                <li><a href="javaasset:"> Profile</a></li>
                                <li>
                                    <a href="javaasset:">
                                        <span class="badge bg-red pull-right">50%</span>
                                        <span>Settings</span>
                                    </a>
                                </li>
                                <li><a href="javaasset:">Help</a></li>
                                <li><a href="/logout"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
       <!-- /top navigation -->

        <!-- page content -->
        @yield('content')
        <!-- /page content -->

        <!-- footer content -->
        <footer>
            <div class="pull-right">
                © 2017 Send Star Wars Facts
            </div>
            <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
    </div>
</div>
<script type="text/javascript" src="{{ asset('assets/template/vendors/jquery/dist/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/template/vendors/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/dataTables.bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/datatables.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/template/vendors/fastclick/lib/fastclick.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/template/vendors/nprogress/nprogress.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/template/vendors/Chart.js/dist/Chart.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/template/vendors/gauge.js/dist/gauge.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/template/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/template/vendors/iCheck/icheck.min.js') }}"></script>
<!-- Skycons -->
<script type="text/javascript" src="{{ asset('assets/template/vendors/skycons/skycons.js') }}"></script>
<!-- Flot -->
<script type="text/javascript" src="{{ asset('assets/template/vendors/Flot/jquery.flot.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/template/vendors/Flot/jquery.flot.pie.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/template/vendors/Flot/jquery.flot.time.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/template/vendors/Flot/jquery.flot.stack.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/template/vendors/Flot/jquery.flot.resize.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/template/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/template/vendors/iCheck/icheck.min.js') }}"></script>
<!-- Flot plugins -->
<script type="text/javascript" src="{{ asset('assets/template/vendors/Flot/jquery.flot.resize.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/template/vendors/flot-spline/js/jquery.flot.spline.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/template/vendors/flot.curvedlines/curvedLines.js') }}"></script>
<!-- DateJS -->
<script type="text/javascript" src="{{ asset('assets/template/vendors/DateJS/build/date.js') }}"></script>
<!-- JQVMap -->
<script type="text/javascript" src="{{ asset('assets/template/vendors/jqvmap/dist/jquery.vmap.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/template/vendors/jqvmap/dist/maps/jquery.vmap.world.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/template/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js') }}"></script>
<!-- bootstrap-daterangepicker -->
<script type="text/javascript" src="{{ asset('assets/template/vendors/moment/min/moment.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/template/vendors/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
<!-- Custom Theme assets -->
<script type="text/javascript" src="{{ asset('assets/template/build/js/custom.min.js') }}"></script>

</body>
</html>
