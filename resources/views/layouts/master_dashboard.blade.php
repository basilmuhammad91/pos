<?php

$blade_users = DB::table('users')
->join('role_users','role_users.user_id','=','users.id')
->join('roles','roles.role_id','=','role_users.role_id')
->where('users.id', Auth::user()->id)
->first();

?>
<!DOCTYPE html>
<html>

<!-- Mirrored from coreplusdemo.lorvent.com/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 22 May 2021 12:33:25 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
    <meta charset="UTF-8">
    <title>Point of Sales</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1' name='viewport'>
    <link rel="shortcut icon" href="{{asset('DashboardAssets')}}/img/favicon.ico"/>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
    <!-- global css -->
    <link type="text/css" rel="stylesheet" href="{{asset('DashboardAssets')}}/css/app.css"/>
    <!-- end of global css -->
    <!--page level css -->
    <link rel="stylesheet" href="{{asset('DashboardAssets')}}/vendors/chartist/css/chartist.min.css">
    <link href="{{asset('DashboardAssets')}}/vendors/nvd3/css/nv.d3.min.css" rel="stylesheet" type="text/css">
    <link href="{{asset('DashboardAssets')}}/vendors/morrisjs/morris.css" rel="stylesheet" type="text/css"/>
    <link href="{{asset('DashboardAssets')}}/vendors/bower-jvectormap/css/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" type="text/css" href="{{asset('DashboardAssets')}}/vendors/awesomebootstrapcheckbox/css/build.css">
    <link rel="stylesheet" type="text/css" href="{{asset('DashboardAssets')}}/css/custom.css">

    <link href="{{asset('DashboardAssets')}}/css/custom_css/dashboard1.css" rel="stylesheet" type="text/css"/>
    <!--end of page level css-->

    <!-- Datatables -->

    <link rel="stylesheet" type="text/css" href="{{asset('DashboardAssets')}}/vendors/datatables/css/buttons.bootstrap4.css"/>
    <link rel="stylesheet" type="text/css" href="{{asset('DashboardAssets')}}/vendors/datatables/css/colReorder.bootstrap4.css"/>
    <link rel="stylesheet" type="text/css" href="{{asset('DashboardAssets')}}/vendors/datatables/css/dataTables.bootstrap4.css"/>
    <link rel="stylesheet" type="text/css" href="{{asset('DashboardAssets')}}/vendors/datatables/css/rowReorder.bootstrap4.css"/>
    <link rel="stylesheet" type="text/css" href="{{asset('DashboardAssets')}}/vendors/datatables/css/scroller.bootstrap4.css"/>
    <link rel="stylesheet" type="text/css" href="{{asset('DashboardAssets')}}/vendors/datatablesmark.js/css/datatables.mark.min.css"/>

    <!-- End of Form Modal -->

    <link href="{{asset('DashboardAssets')}}/vendors/select2/css/select2.min.css" type="text/css" rel="stylesheet">
    <link href="{{asset('DashboardAssets')}}/vendors/select2/css/select2-bootstrap.css" rel="stylesheet">
    <link href="{{asset('DashboardAssets')}}/vendors/bootstrapvalidator/css/bootstrapValidator.min.css" rel="stylesheet">
    <link href="{{asset('DashboardAssets')}}/vendors/iCheck/css/all.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" type="text/css" href="{{asset('DashboardAssets')}}/css/custom.css">    

    <link href="{{asset('DashboardAssets')}}/css/custom_css/wizard.css" rel="stylesheet">
    <!-- End of Custom Form Modal -->

    <!--page level css -->
<link rel="stylesheet" type="text/css" href="{{asset('DashboardAssets')}}/vendors/blueimpgallery/css/blueimp-gallery.min.css"/>
<link rel="stylesheet" href="{{asset('DashboardAssets')}}/vendors/dropify/css/dropify.css">
<link rel="stylesheet" type="text/css" href="{{asset('DashboardAssets')}}/css/custom_css/dropify.css">
<!--end of page level css-->

<!-- DROPDOWN CSS -->

    <link rel="stylesheet" type="text/css" href="{{asset('DashboardAssets')}}/vendors/bootstrap-multiselect/css/bootstrap-multiselect.css" >
    <link rel="stylesheet" type="text/css" href="{{asset('DashboardAssets')}}/vendors/select2/css/select2.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('DashboardAssets')}}/vendors/select2/css/select2-bootstrap.css">
    <link rel="stylesheet" type="text/css" href="{{asset('DashboardAssets')}}/vendors/selectize/css/selectize.css">
    <link rel="stylesheet" type="text/css" href="{{asset('DashboardAssets')}}/vendors/selectric/css/selectric.css">
    <link rel="stylesheet" type="text/css" href="{{asset('DashboardAssets')}}/vendors/selectize/css/selectize.bootstrap3.css">
    <link rel="stylesheet" type="text/css" href="{{asset('DashboardAssets')}}/vendors/iCheck/css/all.css">
    <Link rel="stylesheet" type="text/css" href="{{asset('DashboardAssets')}}/vendors/iCheck/css/line/line.css">

    <!-- NOTIFICATION CSS -->
    <!--page level css -->
    <link rel="stylesheet" type="text/css" href="{{asset('DashboardAssets')}}/css/custom.css">

    <link rel="stylesheet" href="{{asset('DashboardAssets')}}/vendors/animate/animate.min.css"/>
    <link rel="stylesheet" href="{{asset('DashboardAssets')}}/vendors/pnotify/css/pnotify.css">
    <link href="{{asset('DashboardAssets')}}/vendors/pnotify/css/pnotify.brighttheme.css" rel="stylesheet" type="text/css"/>
    <link href="{{asset('DashboardAssets')}}/vendors/pnotify/css/pnotify.buttons.css" rel="stylesheet" type="text/css"/>
    <link href="{{asset('DashboardAssets')}}/vendors/pnotify/css/pnotify.mobile.css" rel="stylesheet" type="text/css"/>
    <link href="{{asset('DashboardAssets')}}/vendors/pnotify/css/pnotify.history.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" type="text/css" href="{{asset('DashboardAssets')}}/css/custom_css/toastr_notificatons.css">
    <!--end of page level css-->

    <!--page level css -->
    <link href="{{asset('DashboardAssets')}}/vendors/iCheck/css/all.css" rel="stylesheet"/>
    <link rel="stylesheet" type="text/css" href="{{asset('DashboardAssets')}}/vendors/bootstrap-fileinput/css/fileinput.css" media="all" />
    <link rel="stylesheet" type="text/css" href="{{asset('DashboardAssets')}}/css/custom.css">

    <link rel="stylesheet" type="text/css" href="{{asset('DashboardAssets')}}/css/formelements.css">
    <!--end of page level css-->



<!-- END -->
</head>
<body class="skin-coreplus">
<div class="preloader">
    <div class="loader_img"><img src="{{asset('DashboardAssets')}}/img/loader.gif" alt="loading..." height="64" width="64"></div>
</div>
<!-- header logo: style can be found in header-->
<header class="header">
    <nav class="navbar navbar-expand-md navbar-static-top">
        <a href="index-2.html" class="logo navbar-brand">
            <!-- Add the class icon to your logo image or logo icon to add the margining -->
            <img src="{{asset('DashboardAssets')}}/img/logo.png" alt="logo"/>
        </a>

        <!-- Header Navbar: style can be found in header-->
        <!-- Sidebar toggle button-->
        <!-- Sidebar toggle button-->
        <div>
            <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button"> <i
                    class="fa fa-fw fa-bars"></i>
            </a>
        </div>


        <div class="navbar-collapse " id="navbarNav">
            <div class="navbar-right ml-auto">
                <ul class="nav navbar-nav ">
                    
                    
                    <!-- Laravel Login UL -->
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                </ul>

                   
                </div>
                    <!-- End of Laravel Login UL -->

                    <!-- User Account: style can be found in dropdown-->
                    <li class="nav-item dropdown user user-menu">
                        <a href="#" class="nav-link dropdown-toggle padding-user pt-3">
                            <img src="{{asset('DashboardAssets')}}/img/user-avatar.png" width="35"
                                 class="rounded-circle img-fluid pull-left"
                                 height="35" alt="User Image">
                            <div class="riot">
                                <div>
                                    {{ Auth::user()->name }}

                                    <span>
                                        <i class="fa fa-caret-down"></i>
                                    </span>
                                </div>
                            </div>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header">
                                <img src="{{asset('DashboardAssets')}}/img/user-avatar.png" class="rounded-circle" alt="User Image">
                                <p> {{ Auth::user()->name }}</p>
                            </li>
                            <!-- Menu Body -->
                            <!-- <li class="p-t-3 nav-item" ><a href="user_profile.html" class="nav-link"> <i class="fa fa-fw fa-user"></i> My
                                Profile </a>
                            </li>
                            <li ></li>
                            <li class="nav-item"><a href="edit_user.html" class="nav-link"> <span><i class="fa fa-fw fa-gear"></i> Account Settings</span>
                            </a></li>
                            <li  class="dropdown-divider"></li> -->
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="text-center pt-2 pb-1">
                                    <a style="display: block;" href="login.html" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <i class="fa fa-fw fa-sign-out"></i>
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
<div class="wrapper row-offcanvas row-offcanvas-left">
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="left-side sidebar-offcanvas">
        <!-- sidebar: style can be found in sidebar-->
        <section class="sidebar">
            <div id="menu" role="navigation">
                <div class="nav_profile">
                    <div class="media profile-left">
                        <a class="pull-left profile-thumb" href="#">
                            <img src="{{asset('DashboardAssets')}}/img/user-avatar.png" class="rounded-circle" alt="User Image">
                        </a>
                        <div class="content-profile pl-3">
                            <h4 class="media-heading">
                                {{ Auth::user()->name }}
                            </h4>
                            <ul class="icon-list list-inline">
                                <li>
                                    <a href="users.html">
                                        <i class="fa fa-fw fa-user"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="lockscreen.html">
                                        <i class="fa fa-fw fa-lock"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="edit_user.html">
                                        <i class="fa fa-fw fa-gear"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="login.html">
                                        <i class="fa fa-fw fa-sign-out"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <ul class="navigation">
                    <li id="active" class="<?php if(URL::current() == 'http://localhost/laravel/pos/public/dashboard') { echo "active"; } else if(URL::current() == 'http://localhost/laravel/pos/public/home') { echo "active"; } ?>">
                        <a href="{{action('MainController@dashboard')}}">
                            <i class="menu-icon fa fa-fw fa-home"></i>
                            <span class="mm-text ">Dashboard</span>
                        </a>
                    </li>
                    @if($blade_users->role_name == 'Admin')
                    <li class="<?php if(URL::current() == 'http://localhost/laravel/pos/public/user') { echo "active"; } else if(URL::current() == 'http://localhost/laravel/pos/public/user/update') {echo "active";} ?>">
                        <a href="{{action('UserController@index')}}">
                            <i class="menu-icon fa fa-fw fa-users"></i>
                            <span class="mm-text ">All users for Admin</span>
                        </a>
                    </li>
                    @endif
                    @if($blade_users->role_name == 'Super Admin')
                    <li class="<?php if(URL::current() == 'http://localhost/laravel/pos/public/admin_user') { echo "active"; } else if(URL::current() == 'http://localhost/laravel/pos/public/admin_user/update') {echo "active";} ?>">
                        <a href="{{action('UserController@view_admin')}}">
                            <i class="menu-icon fa fa-fw fa-users"></i>
                            <span class="mm-text ">All users for Super Admin</span>
                        </a>
                    </li>
                    @endif
                    @if($blade_users->role_name == 'Admin' || $blade_users->role_name == 'Manager') 
                    <li class="<?php if(URL::current() == 'http://localhost/laravel/pos/public/customer') { echo "active"; } else if(URL::current() == 'http://localhost/laravel/pos/public/customer/update') {echo "active";} ?>">
                        <a href="{{action('CustomerController@index')}}">
                            <i class="menu-icon fa fa-fw fa-users"></i>
                            <span class="mm-text ">Customers</span>
                        </a>
                    </li>
                    @endif
                    @if($blade_users->role_name == 'Admin' || $blade_users->role_name == 'Manager')
                    <li class="<?php if(URL::current() == 'http://localhost/laravel/pos/public/category') { echo "active"; } else if(URL::current() == 'http://localhost/laravel/pos/public/category/update') {echo "active";} ?>">
                        <a href="{{action('CategoryController@index')}}">
                            <i class="menu-icon fa fa-fw fa-users"></i>
                            <span class="mm-text ">Categories</span>
                        </a>
                    </li>
                    @endif
                    @if($blade_users->role_name == 'Admin' || $blade_users->role_name == 'Manager')
                    <li class="<?php if(URL::current() == 'http://localhost/laravel/pos/public/product') { echo "active"; } else if(URL::current() == 'http://localhost/laravel/pos/public/product/update') {echo "active";} ?>">
                        <a href="{{action('ProductController@index')}}">
                            <i class="menu-icon fa fa-fw fa-users"></i>
                            <span class="mm-text ">Products</span>
                        </a>
                    </li>
                    @endif
                    @if($blade_users->role_name == 'Admin' || $blade_users->role_name == 'Manager')
                    <li class="<?php if(URL::current() == 'http://localhost/laravel/pos/public/discount') { echo "active"; } else if(URL::current() == 'http://localhost/laravel/pos/public/discount/update') {echo "active";} ?>">
                        <a href="{{action('DiscountController@index')}}">
                            <i class="menu-icon fa fa-fw fa-users"></i>
                            <span class="mm-text ">Discount Offers</span>
                        </a>
                    </li>
                    @endif
                    @if($blade_users->role_name == 'Admin' || $blade_users->role_name == 'Manager')
                    <li class="<?php if(URL::current() == 'http://localhost/laravel/pos/public/sale') { echo "active"; } else if(URL::current() == 'http://localhost/laravel/pos/public/sale/update') {echo "active";} ?>">
                        <a href="{{action('SaleController@index')}}">
                            <i class="fa fa-fw fa-bar-chart-o"></i>
                            <span class="mm-text ml-2">Sales</span>
                        </a>
                    </li>
                    @endif
                    @if($blade_users->role_name == 'Admin' || $blade_users->role_name == 'Manager' || $blade_users->role_name == 'User')
                    <li class="<?php if(URL::current() == 'http://localhost/laravel/pos/public/pos/category') { echo "active"; } else if(URL::current() == 'http://localhost/laravel/pos/category/public/pos/update') {echo "active";} ?>">
                        <a href="{{action('SaleController@pos_category')}}">
                            <i class="fa fa-fw fa-bar-chart-o"></i>
                            <span class="mm-text ml-2">Generate Sales</span>
                        </a>
                    </li>
                    @endif
                    <li class="<?php if(URL::current() == 'http://localhost/laravel/pos/public/pos/category') { echo "active"; } else if(URL::current() == 'http://localhost/laravel/pos/category/public/pos/update') {echo "active";} ?>">
                        <a href="{{action('SaleController@pos_category')}}">
                            <i class="fa fa-fw fa-bar-chart-o"></i>
                            <span class="mm-text ml-2">Monthly Sales Report</span>
                    </li>

                </ul>
                <!-- / .navigation --> </div>
            <!-- menu --> </section>
        <!-- /.sidebar --> </aside>
   
    <!-- /.right-side --> 
     @yield('master_body')
</div>
<!-- ./wrapper -->
<!-- global js -->
<div id="qn"></div>
<script src="{{asset('DashboardAssets')}}/js/app.js" type="text/javascript"></script>
<!-- end of global js -->
<!-- begining of page level js -->
<script src="{{asset('DashboardAssets')}}/js/backstretch.js"></script>
<!--sales tiles-->
<script src="{{asset('DashboardAssets')}}/vendors/countupcircle/js/jquery.countupcircle.js" type="text/javascript"></script>
<script src="{{asset('DashboardAssets')}}/vendors/granim/js/granim.min.js" type="text/javascript"></script>
<!-- end of sales tiles -->
<!-- Flot tab2-->
<script src="{{asset('DashboardAssets')}}/vendors/flotchart/js/jquery.flot.js" type="text/javascript"></script>
<script src="{{asset('DashboardAssets')}}/vendors/flotchart/js/jquery.flot.resize.js" type="text/javascript"></script>
<script src="{{asset('DashboardAssets')}}/vendors/flotchart/js/jquery.flot.time.js" type="text/javascript"></script>
<script src="{{asset('DashboardAssets')}}/vendors/flotchart/js/jquery.flot.symbol.js" type="text/javascript"></script>
<script src="{{asset('DashboardAssets')}}/vendors/flotchart/js/jquery.flot.pie.js" type="text/javascript"></script>
<script src="{{asset('DashboardAssets')}}/vendors/flotchart/js/jquery.flot.stack.js" type="text/javascript"></script>
<script src="{{asset('DashboardAssets')}}/vendors/flot.tooltip/js/jquery.flot.tooltip.js" type="text/javascript"></script>
<script src="{{asset('DashboardAssets')}}/vendors/flotspline/js/jquery.flot.spline.min.js" type="text/javascript"></script>
<!-- end of flot tab2 -->
<script type="text/javascript" src="{{asset('DashboardAssets')}}/vendors/chartist/js/chartist.min.js"></script>
<!--morris donut-->
<script type="text/javascript" src="{{asset('DashboardAssets')}}/vendors/morrisjs/morris.min.js"></script>
<script type="text/javascript" src="{{asset('DashboardAssets')}}/js/raphael.min.js"></script>
<script type="text/javascript" src="{{asset('DashboardAssets')}}/vendors/d3/d3.min.js"></script>
<script type="text/javascript" src="{{asset('DashboardAssets')}}/vendors/nvd3/js/nv.d3.min.js"></script>
<script type="text/javascript" src="{{asset('DashboardAssets')}}/js/custom_js/stream_layers.js"></script>
<!--maps-->
<script src="{{asset('DashboardAssets')}}/vendors/bower-jvectormap/js/jquery-jvectormap-1.2.2.min.js"></script>
<script src="{{asset('DashboardAssets')}}/vendors/bower-jvectormap/js/jquery-jvectormap-world-mill-en.js"></script>
<!-- end of maps -->
<script src="{{asset('DashboardAssets')}}/js/dashboard1.js" type="text/javascript"></script>
<!-- end of page level js -->

<!-- Datatable Scripts -->

<script type="text/javascript" src="{{asset('DashboardAssets')}}/vendors/datatables/js/jquery.dataTables.js"></script>
<script type="text/javascript" src="{{asset('DashboardAssets')}}/vendors/datatables/js/dataTables.bootstrap4.js"></script>
<script type="text/javascript" src="{{asset('DashboardAssets')}}/vendors/datatables/js/dataTables.buttons.js"></script>
<script type="text/javascript" src="{{asset('DashboardAssets')}}/vendors/datatables/js/dataTables.colReorder.js"></script>
<script type="text/javascript" src="{{asset('DashboardAssets')}}/vendors/datatables/js/dataTables.responsive.js"></script>
<script type="text/javascript" src="{{asset('DashboardAssets')}}/vendors/datatables/js/dataTables.rowReorder.js"></script>
<script type="text/javascript" src="{{asset('DashboardAssets')}}/vendors/datatables/js/buttons.colVis.js"></script>
<script type="text/javascript" src="{{asset('DashboardAssets')}}/vendors/datatables/js/buttons.html5.js"></script>
<script type="text/javascript" src="{{asset('DashboardAssets')}}/vendors/datatables/js/buttons.print.js"></script>
<script type="text/javascript" src="{{asset('DashboardAssets')}}/vendors/datatables/js/buttons.bootstrap4.js"></script>
<script type="text/javascript" src="{{asset('DashboardAssets')}}/vendors/datatables/js/buttons.print.js"></script>
<script type="text/javascript" src="{{asset('DashboardAssets')}}/vendors/datatables/js/dataTables.scroller.js"></script>
<script src="{{asset('DashboardAssets')}}/vendors/mark_js/js/jquery.mark.js" charset="UTF-8"></script>
<script src="{{asset('DashboardAssets')}}/vendors/datatablesmark.js/js/datatables.mark.min.js" charset="UTF-8"></script>
<script src="{{asset('DashboardAssets')}}/js/custom_js/responsive_datatables.js" type="text/javascript"></script>
<!-- end of page level js -->

<!-- End of Datatables -->
<script src="{{asset('DashboardAssets')}}/vendors/iCheck/js/icheck.js"></script>
<script src="{{asset('DashboardAssets')}}/vendors/moment/js/moment.min.js"></script>
<script src="{{asset('DashboardAssets')}}/vendors/select2/js/select2.js" type="text/javascript"></script>
<script src="{{asset('DashboardAssets')}}/vendors/bootstrapwizard/js/jquery.bootstrap.wizard.js" type="text/javascript"></script>
<script src="{{asset('DashboardAssets')}}/vendors/bootstrapvalidator/js/bootstrapValidator.min.js" type="text/javascript"></script>
<script src="{{asset('DashboardAssets')}}/js/custom_js/form_wizards.js" type="text/javascript"></script>
<!-- end of page level js -->

<!-- begining of page level js -->
<script type="text/javascript" src="{{asset('DashboardAssets')}}/vendors/bootstrap-multiselect/js/bootstrap-multiselect.js"></script>
<script type="text/javascript" src="{{asset('DashboardAssets')}}/vendors/select2/js/select2.js"></script>
<script type="text/javascript" src="{{asset('DashboardAssets')}}/vendors/select2/js/select2.full.js"></script>

<script type="text/javascript" src="{{asset('DashboardAssets')}}/vendors/selectize/js/standalone/selectize.min.js"></script>
<script type="text/javascript" src="{{asset('DashboardAssets')}}/vendors/iCheck/js/icheck.js"></script>
<script type="text/javascript" src="{{asset('DashboardAssets')}}/vendors/selectric/js/jquery.selectric.min.js"></script>
<script type="text/javascript" src="{{asset('DashboardAssets')}}/js/custom_js/custom_elements.js"></script>
<!-- end of page level js -->

<!-- NOTIFICATION JS -->
<!-- begining of page level js -->
<script type="text/javascript" src="{{asset('DashboardAssets')}}/vendors/pnotify/js/pnotify.js"></script>
<script type="text/javascript" src="{{asset('DashboardAssets')}}/vendors/pnotify/js/pnotify.animate.js"></script>
<script type="text/javascript" src="{{asset('DashboardAssets')}}/vendors/pnotify/js/pnotify.buttons.js"></script>
<script type="text/javascript" src="{{asset('DashboardAssets')}}/vendors/pnotify/js/pnotify.confirm.js"></script>
<script type="text/javascript" src="{{asset('DashboardAssets')}}/vendors/pnotify/js/pnotify.nonblock.js"></script>
<script type="text/javascript" src="{{asset('DashboardAssets')}}/vendors/pnotify/js/pnotify.mobile.js"></script>
<script type="text/javascript" src="{{asset('DashboardAssets')}}/vendors/pnotify/js/pnotify.desktop.js"></script>
<script type="text/javascript" src="{{asset('DashboardAssets')}}/vendors/pnotify/js/pnotify.history.js"></script>
<script type="text/javascript" src="{{asset('DashboardAssets')}}/vendors/pnotify/js/pnotify.callbacks.js"></script>

<!-- end of page level js -->


</body>


<!-- Mirrored from coreplusdemo.lorvent.com/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 22 May 2021 12:33:25 GMT -->
</html>