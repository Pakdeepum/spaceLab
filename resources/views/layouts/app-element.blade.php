<!doctype html>
<html ng-app="application" lang="{{ app()->getLocale() }}">
    <head class="kanitregular">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Spacelab LIS Lab</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <link rel="icon" href="favicon.ico" type="image/x-icon" />
        <!-- END META SECTION -->

        <!-- CSS INCLUDE -->
        <link rel="stylesheet" type="text/css" id="theme" href='{{asset("dependencies/css/theme-default.css")}}'/>
        <link rel="stylesheet" type="text/css" id="theme" href='{{asset("css/custom/main.css")}}'/>
        <!-- EOF CSS INCLUDE -->
        <!-- script -->
        <script type="text/javascript" src='{{asset("dependencies/js/plugins/jquery/jquery.min.js")}}'></script>
        <!-- AngularJs -->
        <script src="{{asset('js/angular-1.7.2/angular.min.js')}}"></script>
        <script src="{{asset('js/angular-1.7.2/dirPagination.js')}}"></script>
        <!-- end script -->

    </head>
    <body>

        @include('elements.navbar')
        @yield('content')


        <!-- START SCRIPTS -->
        <script type="text/javascript" src='{{asset("js/navbar/navbar.js")}}'></script>
        <!-- START PLUGINS -->
        <script type="text/javascript" src='{{asset("dependencies/js/plugins/jquery/jquery-ui.min.js")}}'></script>
        <script type="text/javascript" src='{{asset("dependencies/js/plugins/bootstrap/bootstrap.min.js")}}'></script>
        <!--<script type="text/javascript" src="http://beneposto.pl/jqueryrotate/js/jQueryRotateCompressed.js"></script>-->
        <script type="text/javascript" src='{{asset("dependencies/js/plugins/jQueryRotateCompressed.js")}}'></script>
        <!-- AngularJs -->
        <script src="{{asset('js/angular-1.7.2/angular.min.js')}}"></script>

        <!-- END PLUGINS -->

        <!-- THIS PAGE PLUGINS -->
        <script type='text/javascript' src='{{asset("dependencies/js/plugins/icheck/icheck.min.js")}}'></script>
        <script type="text/javascript" src='{{asset("dependencies/js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js")}}'></script>
        <!-- END PAGE PLUGINS -->

        <!-- START TEMPLATE -->
        <script type="text/javascript" src='{{asset("dependencies/js/plugins.js")}}'></script>
        <script type="text/javascript" src='{{asset("dependencies/js/actions.js")}}'></script>
        <!-- END TEMPLATE -->
    <!-- END SCRIPTS -->
    </body>
</html>
