<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>AdminLTE 2 | Dashboard</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <!-- Font Awesome -->
    {{--<link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">--}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{asset('css/ionicons.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('css/AdminLTE.min.css')}}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{asset('css/_all-skins.min.css')}}">
    <!-- Morris chart -->
    <link rel="stylesheet" href="{{asset('css/morris.css')}}">
    <!-- jvectormap -->
    <link rel="stylesheet" href="{{asset('css/jquery-jvectormap.css')}}">
    <!-- Date Picker -->
    <link rel="stylesheet" href="{{asset('css/bootstrap-datepicker.min.css')}}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{asset('css/daterangepicker.css')}}">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="{{asset('css/bootstrap3-wysihtml5.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/slider.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    {{--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css">--}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/css/fileinput.min.css">
    {{--<link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">--}}




<!-- jQuery 3 -->
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('js/admin/bootstrap-slider.js')}}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
    {{--datatable js--}}
    {{--<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>--}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script type="text/javascript">
        //setup ajax
        $.ajaxSetup(
            {
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            }
        );
        var domain = 'http://xeroshoes.shop/';
    </script>
    <style>
        .gallery img{
            max-width: 25%;
            border: 1px solid #95bcdc;
            float: left;
        }
        img.banner_selected{
            border: 5px solid #458e76;
        }
        tr.product_selected, tr.product_selected img{
            background: #096;
            opacity: 0.5;
        }
        .modal-body {
            max-height: calc(100vh - 200px);
            overflow-y: auto;
        }
    </style>
    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    <header class="main-header">
        <!-- Logo -->
        <a href="index2.html" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>A</b>LT</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>Admin</b>LTE</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>

            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <!-- Messages: style can be found in dropdown.less-->
                {{--<li class="dropdown messages-menu">--}}
                {{--<a href="#" class="dropdown-toggle" data-toggle="dropdown">--}}
                {{--<i class="fa fa-envelope-o"></i>--}}
                {{--<span class="label label-success">4</span>--}}
                {{--</a>--}}
                {{--<ul class="dropdown-menu">--}}
                {{--<li class="header">You have 4 messages</li>--}}
                {{--<li>--}}
                {{--<!-- inner menu: contains the actual data -->--}}
                {{--<ul class="menu">--}}
                {{--<li><!-- start message -->--}}
                {{--<a href="#">--}}
                {{--<div class="pull-left">--}}
                {{--<img src="{{asset('dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">--}}
                {{--</div>--}}
                {{--<h4>--}}
                {{--Support Team--}}
                {{--<small><i class="fa fa-clock-o"></i> 5 mins</small>--}}
                {{--</h4>--}}
                {{--<p>Why not buy a new awesome theme?</p>--}}
                {{--</a>--}}
                {{--</li>--}}
                {{--<!-- end message -->--}}
                {{--<li>--}}
                {{--<a href="#">--}}
                {{--<div class="pull-left">--}}
                {{--<img src="{{asset('dist/img/user3-128x128.jpg')}}" class="img-circle" alt="User Image">--}}
                {{--</div>--}}
                {{--<h4>--}}
                {{--AdminLTE Design Team--}}
                {{--<small><i class="fa fa-clock-o"></i> 2 hours</small>--}}
                {{--</h4>--}}
                {{--<p>Why not buy a new awesome theme?</p>--}}
                {{--</a>--}}
                {{--</li>--}}
                {{--<li>--}}
                {{--<a href="#">--}}
                {{--<div class="pull-left">--}}
                {{--<img src="{{asset('dist/img/user4-128x128.jpg')}}" class="img-circle" alt="User Image">--}}
                {{--</div>--}}
                {{--<h4>--}}
                {{--Developers--}}
                {{--<small><i class="fa fa-clock-o"></i> Today</small>--}}
                {{--</h4>--}}
                {{--<p>Why not buy a new awesome theme?</p>--}}
                {{--</a>--}}
                {{--</li>--}}
                {{--<li>--}}
                {{--<a href="#">--}}
                {{--<div class="pull-left">--}}
                {{--<img src="{{asset('dist/img/user3-128x128.jpg')}}" class="img-circle" alt="User Image">--}}
                {{--</div>--}}
                {{--<h4>--}}
                {{--Sales Department--}}
                {{--<small><i class="fa fa-clock-o"></i> Yesterday</small>--}}
                {{--</h4>--}}
                {{--<p>Why not buy a new awesome theme?</p>--}}
                {{--</a>--}}
                {{--</li>--}}
                {{--<li>--}}
                {{--<a href="#">--}}
                {{--<div class="pull-left">--}}
                {{--<img src="{{asset('dist/img/user4-128x128.jpg')}}" class="img-circle" alt="User Image">--}}
                {{--</div>--}}
                {{--<h4>--}}
                {{--Reviewers--}}
                {{--<small><i class="fa fa-clock-o"></i> 2 days</small>--}}
                {{--</h4>--}}
                {{--<p>Why not buy a new awesome theme?</p>--}}
                {{--</a>--}}
                {{--</li>--}}
                {{--</ul>--}}
                {{--</li>--}}
                {{--<li class="footer"><a href="#">See All Messages</a></li>--}}
                {{--</ul>--}}
                {{--</li>--}}
                {{--<!-- Notifications: style can be found in dropdown.less -->--}}
                {{--<li class="dropdown notifications-menu">--}}
                {{--<a href="#" class="dropdown-toggle" data-toggle="dropdown">--}}
                {{--<i class="fa fa-bell-o"></i>--}}
                {{--<span class="label label-warning">10</span>--}}
                {{--</a>--}}
                {{--<ul class="dropdown-menu">--}}
                {{--<li class="header">You have 10 notifications</li>--}}
                {{--<li>--}}
                {{--<!-- inner menu: contains the actual data -->--}}
                {{--<ul class="menu">--}}
                {{--<li>--}}
                {{--<a href="#">--}}
                {{--<i class="fa fa-users text-aqua"></i> 5 new members joined today--}}
                {{--</a>--}}
                {{--</li>--}}
                {{--<li>--}}
                {{--<a href="#">--}}
                {{--<i class="fa fa-warning text-yellow"></i> Very long description here that may not fit into the--}}
                {{--page and may cause design problems--}}
                {{--</a>--}}
                {{--</li>--}}
                {{--<li>--}}
                {{--<a href="#">--}}
                {{--<i class="fa fa-users text-red"></i> 5 new members joined--}}
                {{--</a>--}}
                {{--</li>--}}
                {{--<li>--}}
                {{--<a href="#">--}}
                {{--<i class="fa fa-shopping-cart text-green"></i> 25 sales made--}}
                {{--</a>--}}
                {{--</li>--}}
                {{--<li>--}}
                {{--<a href="#">--}}
                {{--<i class="fa fa-user text-red"></i> You changed your username--}}
                {{--</a>--}}
                {{--</li>--}}
                {{--</ul>--}}
                {{--</li>--}}
                {{--<li class="footer"><a href="#">View all</a></li>--}}
                {{--</ul>--}}
                {{--</li>--}}
                <!-- Tasks: style can be found in dropdown.less -->
                {{--<li class="dropdown tasks-menu">--}}
                {{--<a href="#" class="dropdown-toggle" data-toggle="dropdown">--}}
                {{--<i class="fa fa-flag-o"></i>--}}
                {{--<span class="label label-danger">9</span>--}}
                {{--</a>--}}
                {{--<ul class="dropdown-menu">--}}
                {{--<li class="header">You have 9 tasks</li>--}}
                {{--<li>--}}
                {{--<!-- inner menu: contains the actual data -->--}}
                {{--<ul class="menu">--}}
                {{--<li><!-- Task item -->--}}
                {{--<a href="#">--}}
                {{--<h3>--}}
                {{--Design some buttons--}}
                {{--<small class="pull-right">20%</small>--}}
                {{--</h3>--}}
                {{--<div class="progress xs">--}}
                {{--<div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar"--}}
                {{--aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">--}}
                {{--<span class="sr-only">20% Complete</span>--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--</a>--}}
                {{--</li>--}}
                {{--<!-- end task item -->--}}
                {{--<li><!-- Task item -->--}}
                {{--<a href="#">--}}
                {{--<h3>--}}
                {{--Create a nice theme--}}
                {{--<small class="pull-right">40%</small>--}}
                {{--</h3>--}}
                {{--<div class="progress xs">--}}
                {{--<div class="progress-bar progress-bar-green" style="width: 40%" role="progressbar"--}}
                {{--aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">--}}
                {{--<span class="sr-only">40% Complete</span>--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--</a>--}}
                {{--</li>--}}
                {{--<!-- end task item -->--}}
                {{--<li><!-- Task item -->--}}
                {{--<a href="#">--}}
                {{--<h3>--}}
                {{--Some task I need to do--}}
                {{--<small class="pull-right">60%</small>--}}
                {{--</h3>--}}
                {{--<div class="progress xs">--}}
                {{--<div class="progress-bar progress-bar-red" style="width: 60%" role="progressbar"--}}
                {{--aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">--}}
                {{--<span class="sr-only">60% Complete</span>--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--</a>--}}
                {{--</li>--}}
                {{--<!-- end task item -->--}}
                {{--<li><!-- Task item -->--}}
                {{--<a href="#">--}}
                {{--<h3>--}}
                {{--Make beautiful transitions--}}
                {{--<small class="pull-right">80%</small>--}}
                {{--</h3>--}}
                {{--<div class="progress xs">--}}
                {{--<div class="progress-bar progress-bar-yellow" style="width: 80%" role="progressbar"--}}
                {{--aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">--}}
                {{--<span class="sr-only">80% Complete</span>--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--</a>--}}
                {{--</li>--}}
                {{--<!-- end task item -->--}}
                {{--</ul>--}}
                {{--</li>--}}
                {{--<li class="footer">--}}
                {{--<a href="#">View all tasks</a>--}}
                {{--</li>--}}
                {{--</ul>--}}
                {{--</li>--}}
                <!-- User Account: style can be found in dropdown.less -->
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="{{asset('') . Auth::user()->avatar}}" class="user-image" alt="User Image">
                            <span class="hidden-xs">{{\Illuminate\Support\Facades\Auth::user()->name}}</span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header">
                                <img src="{{asset('') . Auth::user()->avatar}}" class="img-circle" alt="User Image">

                                <p>
                                    {{\Illuminate\Support\Facades\Auth::user()->name}}
                                    <small>Member since {{Auth::user()->created_at}}</small>
                                </p>
                            </li>
                            <!-- Menu Body -->
                            <li class="user-body">
                                <div class="row">
                                    <div class="col-xs-4 text-center">
                                        <a href="#">Followers</a>
                                    </div>
                                    <div class="col-xs-4 text-center">
                                        <a href="#">Sales</a>
                                    </div>
                                    <div class="col-xs-4 text-center">
                                        <a href="#">Friends</a>
                                    </div>
                                </div>
                                <!-- /.row -->
                            </li>
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left">
                                    {{--<a href="{{asset('')}}/profile/{{Auth::user()->id}}" class="btn btn-default btn-flat">Profile</a>--}}
                                    <a href="#" class="btn btn-default btn-flat">Profile</a>
                                </div>
                                <div class="pull-right">
                                    <a href="{{ route('logout') }}" class="btn btn-default btn-flat" onclick="event.preventDefault();
          document.getElementById('logout-form').submit();">Sign out</a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <!-- Control Sidebar Toggle Button -->
                    {{--<li>--}}
                    {{--<a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>--}}
                    {{--</li>--}}
                </ul>
            </div>
        </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="{{asset('') . Auth::user()->avatar}}" class="img-circle" alt="User Image">
                </div>
                <div class="pull-left info">
                    <p>{{\Illuminate\Support\Facades\Auth::user()->name}}</p>
                    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                </div>
            </div>
            <!-- search form -->
            <form action="#" method="get" class="sidebar-form">
                <div class="input-group">
                    <input type="text" name="q" class="form-control" placeholder="Search...">
                    <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
                </div>
            </form>
            <!-- /.search form -->
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu" data-widget="tree">
                <li class="header">MAIN NAVIGATION</li>
                <li>
                    <a href="{{asset('/')}}">
                        <i class="fa fa-dashboard"></i> <span>Shop</span>
                    </a>
                </li>
                <li>
                    <a href="{{asset('/admin')}}">
                        <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                    </a>
                </li>
                <li class="treeview">
                    <a href="{{asset('/admin/category')}}">
                        <i class="fa fa-files-o"></i>
                        <span>Category</span>

                    </a>
                    <ul class="treeview-menu">
                        <li>
                            <a href="{{asset('admin/category')}}"><i class="fa fa-circle-o"></i> All Category</a>
                            @foreach($categorys as $category)
                                <a href="{{asset('admin/category')}}/{{$category->slug}}"><i class="fa fa-circle-o"></i>{{$category->name}}</a>
                                @endforeach
                        </li>
                        {{--@foreach($categorys as $category)--}}
                            {{--<li><a href="{{asset('admin/category') . '/' . $category->id }}"><i class="fa fa-circle-o"></i> {{$category->name}}</a></li>--}}
                        {{--@endforeach--}}

                    </ul>
                </li>
                <li>
                    <a href="{{asset('/admin/product')}}">
                        <i class="fa fa-th"></i> <span>Product</span>
                    </a>
                </li>
                <li class="treeview">
                    <a href="{{asset('/admin/sale')}}">
                        <i class="fa fa-files-o"></i>
                        <span>Sale</span>
                    </a>
                    <ul class="treeview-menu">
                        <li>
                            <a href="{{asset('admin/sale')}}"><i class="fa fa-circle-o"></i> Sale event</a>
                        </li>
                        <li>
                            <a href="{{asset('admin/sale-in_time')}}"><i class="fa fa-circle-o"></i>Sale event in time</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="{{asset('/admin/stockin')}}">
                        <i class="fa fa-th"></i> <span>Stock In</span>
                    </a>
                </li>
                <li>
                    <a href="{{asset('/admin/stockout')}}">
                        <i class="fa fa-th"></i> <span>Stock Out</span>
                    </a>
                </li>

                <li class="treeview">
                    <a href="{{asset('/admin/order')}}">
                        <i class="fa fa-files-o"></i>
                        <span>Order</span>
                    </a>
                    <ul class="treeview-menu">
                        <li>
                            <a href="{{asset('admin/order')}}"><i class="fa fa-circle-o"></i>Confirm orders</a>
                        </li>
                        <li>
                            <a href="{{asset('admin/wait_order')}}"><i class="fa fa-circle-o"></i>Delivering orders</a>
                        </li>
                        <li>
                            <a href="{{asset('admin/received_order')}}"><i class="fa fa-circle-o"></i>Received orders</a>
                        </li>
                        <li>
                            <a href="{{asset('admin/cancel_order')}}"><i class="fa fa-circle-o"></i>Canceled orders</a>
                        </li>
                    </ul>
                </li>

                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-laptop"></i>
                        <span>User</span>
                        <span class="pull-right-container">
                            {{--<small class="label  bg-blue admincount" data-id="{{$admincount}}">{{$admincount}}</small>--}}
                            {{--<small class="label  bg-green usercount" data-id="{{$usercount}}">{{$usercount}}</small>--}}

                        </span>
                        <span class="pull-right-container">
            </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{asset('/admin/user')}}"><i class="fa fa-circle-o"></i> All user</a></li>
                        {{--<li>--}}
                            {{--<a href="{{asset('/admin/adminuser')}}"><i class="fa fa-circle-o"></i> Admin  <small class="label bg-blue admincount" data-id="{{$admincount}}">{{$admincount}}</small></a>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                            {{--<a href="{{asset('/admin/normaluser')}}"><i class="fa fa-circle-o"></i> User  <small class="label  bg-green usercount" data-id="{{$usercount}}">{{$usercount}}</small></a>--}}
                        {{--</li>--}}
                    </ul>
                </li>

            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                @yield('page_name')
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">
            @yield('content')
            @yield('link')

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <b>Version</b> 2.4.0
        </div>
        <strong>Copyright &copy; 2014-2016 <a href="https://adminlte.io">Almsaeed Studio</a>.</strong> All rights
        reserved.
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Create the tabs -->
        <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
            <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
            <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
        </ul>
        <!-- Tab panes -->
    </aside>
</div>
<!-- ./wrapper -->

<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<!-- Morris.js charts -->
{{--<script src="{{asset('js/raphael.min.js')}}"></script>--}}
{{--<script src="{{asset('js/morris.min.js')}}"></script>--}}
<!-- Sparkline -->
<script src="{{asset('js/jquery.sparkline.min.js')}}"></script>
<!-- jvectormap -->
<script src="{{asset('js/jquery-jvectormap-1.2.2.min.js')}}"></script>
<script src="{{asset('js/jquery-jvectormap-world-mill-en.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset('js/jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{asset('js/moment.min.js')}}"></script>
<script src="{{asset('js/daterangepicker.js')}}"></script>
<!-- datepicker -->
<script src="{{asset('js/bootstrap-datepicker.min.js')}}"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="{{asset('js/bootstrap3-wysihtml5.all.min.js')}}"></script>
<!-- Slimscroll -->
<script src="{{asset('js/jquery.slimscroll.min.js')}}"></script>
<!-- FastClick -->
<script src="{{asset('js/fastclick.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('js/adminlte.min.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
{{--<script src="{{asset('js/dashboard.js')}}"></script>--}}
<!-- AdminLTE for demo purposes -->
<script src="{{asset('js/demo.js')}}"></script>
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script>--}}
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/js/fileinput.min.js"></script>--}}
<script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
<script src="/vendor/unisharp/laravel-ckeditor/adapters/jquery.js"></script>
{{--<script src="{{asset('js/ckeditor.js')}}"></script>--}}
{{--<script src="{{asset('js/adapters/jquery.js')}}"></script>--}}
{{--<script src="https://cdn.ckeditor.com/4.9.2/standard/ckeditor.js"></script>--}}
<script src="https://cdn.ckeditor.com/ckeditor5/10.0.0/classic/ckeditor.js"></script>
@yield('script')
</body>
</html>

