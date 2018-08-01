<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ URL::asset('admin/assets/images/favicon.png') }}">
    <title>Spice HRM</title>
    <!-- Bootstrap Core CSS -->
    <link href="{{ URL::asset('admin/assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{ URL::asset('admin/css/style.css') }}" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="{{ URL::asset('admin/css/colors/green.css') }}" id="theme" rel="stylesheet">
    <link href=" //cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" id="theme" rel="stylesheet">
     
     <script src="{{ URL::asset('admin/assets/plugins/jquery/jquery.min.js') }}"></script>
    
     <script src="{{ URL::asset('admin/assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
       
       
     <script src="{{ URL::asset('assets/plugins/parsley/parsley.min.js') }}"></script>  
     
     
     <link rel="stylesheet" href="{{ URL::asset('assets/plugins/datepicker/datepicker3.css') }}">
       

</head>

<body class="fix-header fix-sidebar card-no-border">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar">
            <nav class="navbar top-navbar navbar-toggleable-sm navbar-light">
                <!-- ============================================================== -->
                <!-- Logo -->
                <!-- ============================================================== -->
               
                
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav mr-auto mt-md-0 ">
                        <!-- This is  -->
                        <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                        <li class="nav-item hidden-sm-down">
                           
                            
                        </li>
                    </ul>
                    <!-- ============================================================== -->
                    <!-- User profile and search -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav my-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{  Auth::user()->name }}</a>
                        </li>
                        
                          <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="{{ route('logout') }}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                               
                                onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"
                               
                               >Log Out</a>
                            
                               <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li>
                            <a href="{{ route('Tenant.dashboard') }}" class="waves-effect"><i class="fa fa-clock-o m-r-10" aria-hidden="true"></i>Dashboard</a>
                        </li>
                       
                        <li>
                            <a href="{{ route('Tenant.index') }}" class="waves-effect"><i class="fa fa-home m-r-10" aria-hidden="true"></i>Tenants</a>
                        </li>
                        <li>
                            <a href="{{ route('Tenantusers.index') }}" class="waves-effect"><i class="fa fa-users m-r-10" aria-hidden="true"></i>Users</a>
                        </li>
                        <li>
                            <a href="{{ route('Tenant.sales') }}" class="waves-effect"><i class="fa fa-globe m-r-10" aria-hidden="true"></i>Sales</a>
                        </li>
                        
                        <li>
                            <a href="{{ route('Tenant.payroll') }}" class="waves-effect"><i class="fa fa-globe m-r-10" aria-hidden="true"></i>Payroll</a>
                        </li>
                       
                    </ul>
                 
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
        
            
               @yield('content')
            
            
            
            <!-- ============================================================== -->
            <footer class="footer text-center">
               Spice Hrm
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->

    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{ URL::asset('admin/assets/plugins/bootstrap/js/tether.min.js') }}"></script>

    
    
    <script src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    
     <script src="{{ URL::asset('assets/plugins/daterangepicker/daterangepicker.js') }}"></script>
       <!-- bootstrap datepicker -->
       <script src="{{ URL::asset('assets/plugins/datepicker/bootstrap-datepicker.js') }}"></script>
    
    <script type="text/javascript">
        
      
        $(document).ready(function(){
            
           $('.datepicker').datepicker({
           autoclose: true
           }); 
           $('.datatable').DataTable();
      });
      
      
     </script>
        
        
        
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="{{ URL::asset('admin/js/jquery.slimscroll.js') }}"></script>
    <!--Wave Effects -->
    <script src="{{ URL::asset('admin/js/waves.js') }}"></script>
    <!--Menu sidebar -->
    <script src="{{ URL::asset('admin/js/sidebarmenu.js') }}"></script>
    <!--stickey kit -->
    <script src="{{ URL::asset('admin/assets/plugins/sticky-kit-master/dist/sticky-kit.min.js') }}"></script>
    <!--Custom JavaScript -->
    <script src="{{ URL::asset('admin/js/custom.min.js') }}"></script>
    <!-- ============================================================== -->
    <!-- This page plugins -->
    <!-- ============================================================== -->
    <!-- Flot Charts JavaScript -->
    <script src="{{ URL::asset('admin/assets/plugins/flot/jquery.flot.js') }}"></script>
    <script src="{{ URL::asset('admin/assets/plugins/flot.tooltip/js/jquery.flot.tooltip.min.js') }}"></script>
    <script src="{{ URL::asset('admin/js/flot-data.js') }}"></script>
    <!-- ============================================================== -->
    <!-- Style switcher -->
    <!-- ============================================================== -->
    <script src="{{ URL::asset('admin/assets/plugins/styleswitcher/jQuery.style.switcher.js') }}"></script>
</body>

</html>
