<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="description" content="">
    <meta name="author" content="">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
  
    <title>{{(@$title)?ucwords(@$title):'Dashboard'}}</title> 
        <link rel="icon" href="{{ asset('images/fevicon.png') }}">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <link rel="stylesheet" href="{{ asset('admin/assets/vendor_components/bootstrap/dist/css/bootstrap.css') }}">
        <link rel="stylesheet" href="{{ asset('css/jquery.dataTables.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/jquery_fancy_box.css') }}">

    
    <!-- Bootstrap extend-->
    <link rel="stylesheet" href="{{ asset('admin/css/bootstrap-extend.css') }}">
    
    <link rel="stylesheet" href="{{ asset('admin/assets/vendor_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">

    <link rel="stylesheet" href="{{ asset('admin/assets/vendor_plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
<link rel="stylesheet" href="{{ asset('admin/css/rateit.css') }}"> 
    <!-- theme style -->
    <link rel="stylesheet" href="{{ asset('admin/css/master_style.css') }}">
    
    <link rel="stylesheet" href="{{ asset('admin/css/master_style_new.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/skins/_all-skins.css') }}">
    <!-- horizontal menu style -->
    <!--<link rel="stylesheet" href="{{ asset('admin/css/horizontal_menu_style.css') }}">-->
    
    
    <!-- Morris charts -->
    <link rel="stylesheet" href="{{ asset('admin/assets/vendor_components/morris.js/morris.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/vendor_components/nestable/nestable.css') }}">   
        <link rel="stylesheet" href="{{ asset('admin/css/vrp.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" /> 
        
    <style>
    @import url({{ asset('admin/assets/vendor_components/font-awesome/css/font-awesome.css') }});
    @import url({{ asset('admin/assets/vendor_components/Ionicons/css/ionicons.css') }});
    @import url({{ asset('admin/assets/vendor_components/themify-icons/themify-icons.css') }});
    @import url({{ asset('admin/assets/vendor_components/linea-icons/linea.css') }});
    @import url({{ asset('admin/assets/vendor_components/glyphicons/glyphicon.css') }});
    @import url({{ asset('admin/assets/vendor_components/flag-icon/css/flag-icon.css') }});
    @import url({{ asset('admin/assets/vendor_components/material-design-iconic-font/css/materialdesignicons.css') }});
    @import url({{ asset('admin/assets/vendor_components/simple-line-icons-master/css/simple-line-icons.css') }});
    
    
    .hideElement{
        display:none;
    }
    .help-block{
        color: red;
    }
    </style>


  
</head>
<?php 
 

  $access_array=array(
      "admin/ledger"=>1,
      "admin/users_role"=>1,
      "admin/permissions"=>1,
      "admin/add_permissions"=>1,
      "admin/edit_permissions"=>1,
      "admin/role_users"=>1,
      "admin/edit_user"=>1,
      "admin/add_user"=>1,
      "admin/dashboard"=>999,
      "admin/changePassword"=>999,
      "admin/home_slider"=>2,
      "admin/cat"=>14,
      "admin/brands"=>5,
      "admin/coupons"=>12,
      "admin/offers"=>7,
      "admin/product_offers"=>8,
      "admin/make"=>9,
      "admin/gift"=>8,
      "admin/products"=>4,
      "admin/tire-product"=>10,
      "admin/battery-product"=>11,
      "admin/rating_review"=>12,
      "admin/orders"=>13,
      "admin/reasons"=>13,
      "admin/cartUser"=>14,
      "admin/reports"=>15,
      "admin/customers"=>17,
      "admin/subscribers"=>17,
      "admin/customers_pay"=>18,
      "admin/installer"=>19,
      "admin/services"=>19,
      "admin/services"=>19,
      "admin/pages"=>21,
      "admin/store_info"=>20,
      "admin/faqs"=>21,
      "admin/blogs"=>23,
  );
  
$uri= $_SERVER['REQUEST_URI'];
$ar=explode("/",$uri);
$route=$ar[2]."/".$ar[3];
$module_id=0;

    if (array_key_exists($route,$access_array))
    {
    $module_id=$access_array[$route];
    }
  
    if( $module_id==10){
      $route=$ar[2]."/".$ar[3]."/".$ar[4];
      if (array_key_exists($route,$access_array))
      {
      $module_id=$access_array[$route];
      }else{
        $module_id=0;
      }
     
    }
    if($module_id==999){
       $module_id=1;
    }
    else if($module_id<999){
     
    
    }   else{
      $module_id=0;
    }
    
?>
 <?php 
           
            

                  ?>
<body class="hold-transition skin-purple-light layout-top-nav sidebar-mini">
<div class="wrapper">
    <header class="main-header">
    <div class="inside-header">
        <!-- Logo -->
            @if (Auth::guard('')->check())
                <a href="{{ url('admin/dashboard') }}" class="logo">
            @endif
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <b class="logo-mini">
               <span class="light-logo">Joom</span>
             <!-- <span class="dark-logo"><img src="{{ asset('images/logo.png') }}" alt="logo"></span>-->
          </b>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg">
            <!--   <img src="{{ asset('images/logo.png') }}" alt="logo" class="light-logo">
             <img src="{{ asset('images/logo.png') }}" alt="logo" class="dark-logo">-->
          </span>
        </a>
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button"><span class="sr-only">Toggle navigation</span></a>
        <!-- Header Navbar -->
        <nav class="navbar navbar-static-top">
          <!-- Sidebar toggle button-->
          <!--<a href="#" class="sidebar-toggle d-block d-lg-none" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>-->
<div></div>

        </nav>  
    </div>
  </header>
    <aside class="main-sidebar">
    <!-- sidebar-->
    <section class="sidebar" style="height: auto;">
      
      <!-- sidebar menu--> @if(auth()->user()->user_role==1)
      <ul class="sidebar-menu tree" data-widget="tree">
        <li class="active">
          <a href="{{ url('admin/dashboard') }}">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
                      <li class="nav-item dropdown">
                         <li class="{{ Route::currentRouteNamed('users') ? 'active' : '' }}"><a href="{{ route('users') }}"> <span>Users</span></a></li>
                         <li class="{{ Route::currentRouteNamed('tasks') ? 'active' : '' }}"><a href="{{ route('tasks') }}"><span>Tasks</span></a></li> 
                         <li class="{{ Route::currentRouteNamed('logout') ? 'active' : '' }}"><a href="{{ route('logout') }}"> <span>Logout</span></a></li>
                    </li>
      </ul>
      @else

            <ul class="sidebar-menu tree" data-widget="tree">
        <li class="active">
          <a href="{{ url('user/dashboard') }}">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
                      <li class="nav-item dropdown">
                        
                         <li class="{{ Route::currentRouteNamed('tasks') ? 'active' : '' }}"><a href="{{ route('tasks') }}"><span>My Tasks</span></a></li> 
                         <li class="{{ Route::currentRouteNamed('logout') ? 'active' : '' }}"><a href="{{ route('logout') }}"> <span>Logout</span></a></li>
                    </li>
      </ul>
     

      @endif
    </section>
  </aside>

    <div class="content-wrapper">
    
        <!-- Main content -->
      <section class="content">
     
       <div class="row">
        <!-- left column -->
        <div class="col-12">
          <!-- general form elements -->
          <div class="box">
            
            <!-- .box-body -->
              <div class="box-body">

   
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <div class="headingbox">
        
        
    </div>
</div>  <!-- form start -->
                
                    @include('admin.includes.form_error') 
                    @yield('content')
                
                    <!-- /form  end -->
              </div>
              
              <!-- /.box-body -->
                    </div>
          <!-- /.box -->


        </div>
        <!--/.col (left) -->
        <!-- right column -->
       
        <!--/.col (right) -->
      </div>
      <!-- /.row -->
      
    </section>
    <!-- /.content -->
    
    </div>
    
    <footer class="main-footer">

  All Rights Reserved.
    </footer>
    @include('admin.includes.script') 
    </div>
    
      
<script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />


</body>
</html>
    
