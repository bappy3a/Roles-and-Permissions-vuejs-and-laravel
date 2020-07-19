<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Responsive Admin Dashboard Template">
        <meta name="keywords" content="admin,dashboard">
        <meta name="author" content="skcats">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Styles -->
        <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
        <link href="{{asset('assets/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
        <link href="{{asset('assets/plugins/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
        <link href="{{asset('assets/plugins/icomoon/style.css')}}" rel="stylesheet">
        <link href="{{ asset('assets/plugins/uniform/css/default.css') }}" rel="stylesheet"/>
        <link href="{{asset('assets/plugins/switchery/switchery.min.css')}}" rel="stylesheet"/>
        <link href="{{asset('assets/plugins/nvd3/nv.d3.min.css')}}" rel="stylesheet">  
      
        <!-- Theme Styles -->
        <link href="{{asset('assets/css/ecaps.min.css')}}" rel="stylesheet">
        <link href="{{asset('assets/css/custom.css')}}" rel="stylesheet">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body>
        
        <!-- Page Container -->
        <div class="page-container" id="app">
            <!-- Page Sidebar -->
            <div class="page-sidebar">
                <a class="logo-box" href="index.html">
                    <span>{{ config('app.name', 'Laravel') }}</span>
                    <i class="icon-radio_button_unchecked" id="fixed-sidebar-toggle-button"></i>
                    <i class="icon-close" id="sidebar-toggle-button-close"></i>
                </a>
                <div class="page-sidebar-inner">
                    <div class="page-sidebar-menu">
                        <sidenav :user="{{ Auth::user() }}" :permission="{{ Auth::user()->role->permission }}" ></sidenav>
                    </div>
                </div>
            </div><!-- /Page Sidebar -->
            
            <!-- Page Content -->
            <div class="page-content">
                <!-- Page Inner -->
                <div class="page-inner" style="margin-top: 40px;">
                    <router-view></router-view>

                </div>
            </div><!-- /Page Content -->
        </div><!-- /Page Container -->
        
        
        <!-- Javascripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="{{ asset('assets/plugins/jquery/jquery-3.1.0.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
        <script src="{{asset('assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
        <script src="{{asset('assets/plugins/uniform/js/jquery.uniform.standalone.js')}}"></script>
        <script src="{{asset('assets/plugins/switchery/switchery.min.js')}}"></script>
        <script src="{{asset('assets/plugins/d3/d3.min.js')}}"></script>
        <script src="{{asset('assets/plugins/nvd3/nv.d3.min.js')}}"></script>
        <script src="{{asset('assets/plugins/flot/jquery.flot.min.js')}}"></script>
        <script src="{{asset('assets/plugins/flot/jquery.flot.time.min.js')}}"></script>
        <script src="{{asset('assets/plugins/flot/jquery.flot.symbol.min.js')}}"></script>
        <script src="{{asset('assets/plugins/flot/jquery.flot.resize.min.js')}}"></script>
        <script src="{{asset('assets/plugins/flot/jquery.flot.tooltip.min.js')}}"></script>
        <script src="{{asset('assets/plugins/flot/jquery.flot.pie.min.js')}}"></script>
        <script src="{{asset('assets/plugins/chartjs/chart.min.js')}}"></script>
        <script src="{{asset('assets/js/ecaps.min.js')}}"></script>
        <script src="{{asset('assets/js/pages/dashboard.js')}}"></script>
    </body>
</html>