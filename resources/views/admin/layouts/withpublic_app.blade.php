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
        <link rel="icon" href="{{ asset('public/images/fevicon.png') }}">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <link rel="stylesheet" href="{{ asset('public/admin/assets/vendor_components/bootstrap/dist/css/bootstrap.css') }}">
        <link rel="stylesheet" href="{{ asset('public/css/jquery.dataTables.min.css') }}">
        <link rel="stylesheet" href="{{ asset('public/css/jquery_fancy_box.css') }}">

    
    <!-- Bootstrap extend-->
    <link rel="stylesheet" href="{{ asset('public/admin/css/bootstrap-extend.css') }}">
    
    <link rel="stylesheet" href="{{ asset('public/admin/assets/vendor_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">

    <link rel="stylesheet" href="{{ asset('public/admin/assets/vendor_plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
<link rel="stylesheet" href="{{ asset('public/admin/css/rateit.css') }}"> 
    <!-- theme style -->
    <link rel="stylesheet" href="{{ asset('public/admin/css/master_style.css') }}">
    
    <link rel="stylesheet" href="{{ asset('public/admin/css/master_style_new.css') }}">
    <link rel="stylesheet" href="{{ asset('public/admin/css/skins/_all-skins.css') }}">
    <!-- horizontal menu style -->
    <!--<link rel="stylesheet" href="{{ asset('public/admin/css/horizontal_menu_style.css') }}">-->
    
    
    <!-- Morris charts -->
    <link rel="stylesheet" href="{{ asset('public/admin/assets/vendor_components/morris.js/morris.css') }}">
    <link rel="stylesheet" href="{{ asset('public/admin/assets/vendor_components/nestable/nestable.css') }}">   
        <link rel="stylesheet" href="{{ asset('public/admin/css/vrp.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" /> 
        
    <style>
    @import url({{ asset('public/admin/assets/vendor_components/font-awesome/css/font-awesome.css') }});
    @import url({{ asset('public/admin/assets/vendor_components/Ionicons/css/ionicons.css') }});
    @import url({{ asset('public/admin/assets/vendor_components/themify-icons/themify-icons.css') }});
    @import url({{ asset('public/admin/assets/vendor_components/linea-icons/linea.css') }});
    @import url({{ asset('public/admin/assets/vendor_components/glyphicons/glyphicon.css') }});
    @import url({{ asset('public/admin/assets/vendor_components/flag-icon/css/flag-icon.css') }});
    @import url({{ asset('public/admin/assets/vendor_components/material-design-iconic-font/css/materialdesignicons.css') }});
    @import url({{ asset('public/admin/assets/vendor_components/simple-line-icons-master/css/simple-line-icons.css') }});
    
    
    .hideElement{
        display:none;
    }
    </style>
  
</head>
<?php 
  $records=DB::table('permissions')->select('module_id')->where('user_role_id',auth()->user()->user_role)->get();
  $permitted=array();
  foreach($records as $record){
      array_push($permitted,$record->module_id);
  }

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
     
      if (in_array($module_id, $permitted)){
        $module_id=1;
      }else{
        $module_id=0;
      }
    }   else{
      $module_id=0;
    }
    
?>

@if($module_id==0)
<!--<script>window.location = "<?php echo URL::to("admin/dashboard") ?>";</script>-->
@endif()
 <?php 
              $records=DB::table('permissions')->select('module_id')->where('user_role_id',auth()->user()->user_role)->get();
              $permitted=array();
              foreach($records as $record){
                  array_push($permitted,$record->module_id);
              }
        $booktype = DB::table('tbl_home_section')->whereIn('id',[1,3,4])->whereNull('deleted_at')->get(['id','type','name']);
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
              <span class="light-logo"><img src=" {{ asset('public/images/logo.png') }}" alt="logo"></span>
             <!-- <span class="dark-logo"><img src="{{ asset('public/images/logo.png') }}" alt="logo"></span>-->
          </b>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg">
            <!--   <img src="{{ asset('public/images/logo.png') }}" alt="logo" class="light-logo">
             <img src="{{ asset('public/images/logo.png') }}" alt="logo" class="dark-logo">-->
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
          <div class="navbar-custom-menu">
              
            <ul class="nav navbar-nav">
                
             
              <!-- User Account -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                     @if (Auth::guard('')->check())
                     
                     <img src=" {{ asset('public/admin/images/user5-128x128.jpg') }}" class="user-image rounded-circle" alt="User Image">
                     @endif
                  
                </a>
                <ul class="dropdown-menu scale-up">
                  <!-- User image -->
                  <li class="user-header">
                    @if (Auth::guard('')->check())
                        
                     <img src=" {{ asset('public/admin/images/user5-128x128.jpg') }}" class="user-image rounded-circle" alt="User Image">
                     @endif

                    <p>
                       
                      <small class="mb-5"></small>
                       <!-- <a href="#" class="btn btn-danger btn-sm btn-rounded">View Profile</a>-->
                    </p>
                  </li>
                  <!-- Menu Body -->
                 
                  <li class="user-body">
                    
                      <div class="col-12 text-left">
                          Hello, {{auth()->guard('')->user()->username}}
                          @if (auth()->user()->user_role==1)
                          
                            
                            <a href="{{ route('store_info') }}"><i class="fa fa-user-circle mr-15"></i>Settings</a>
                            @endif
                            
                              <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                           <i class="fa fa-power-off"></i> Logout
                                        </a> 
                             
                        
                        <a href="#" ><i class="fa fa-power-off"></i> Change Password</a>
                        <!-- <a href="" ><i class="fa fa-power-off"></i> Change Password</a> -->
    
                      </div>                
                    
                  </li>
                </ul>
              </li>
              
             

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                        
              <!-- Control Sidebar Toggle
              <li>
                <a href="#" data-toggle="control-sidebar"><i class="fa fa-cog fa-spin"></i></a>
              </li> Button -->
            </ul>
          </div>
         
        </nav>  
    </div>
  </header>
    <aside class="main-sidebar">
    <!-- sidebar-->
    <section class="sidebar" style="height: auto;">
      
      <!-- sidebar menu-->
      <ul class="sidebar-menu tree" data-widget="tree">
        
        <!-- <li class="{{ Route::currentRouteNamed('dashboard') ? 'active' : '' }}"> -->
        <li class="active">
          <a href="{{ url('admin/dashboard') }}">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
        <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-th mr-5"></i> <span>Master</span>
                        </a>              
                        <ul class="dropdown-menu multilevel scale-up-left">
                        
                        <li class="nav-item"><a class="nav-link" href="{{route('country')}}">Country</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{route('categories')}}">Category</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{route('client_module')}}">Client's</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{route('skill_module')}}">Skill</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{route('bidder_module')}}">Bidder</a></li>
                      
                        </ul>
                    </li>
                   
           
            

      
  
        
      </ul>
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
              <!--<div class="box-header">
                  <div class="box-header maintitle">
                       <h4 class="box-title">{{ucwords(@$page_details['title'])}}{{ucwords(@$title)}}</h4>
                  </div>
                  </div>-->
    <div class="box-controls pull-right">
      <?php if(@$page_details['url']!=''):?>
      <span class="btn btn-info btn-gradient btn-sm pull-right ml_20"><a class="clr_white" href="{{$page_details['url']}}" style="color: #fff;">Add New </a></span>
      
      <?php endif; 
     if(@$page_details['backurl']!=''):?>
     
    <span class="btn btn-dark btn-gradient btn-sm pull-right ml_20" ><a class="clr_white" href="{{$page_details['backurl']}}" style="color: #fff;">Go Back</a></span>  
    
                    
    <?php endif;?>
    
    
    <div class="box-controls pull-right">
      <?php if(@$url!=''):?>
     
      <span class="btn btn-info btn-gradient btn-sm pull-right ml_20"><a class="clr_white" href="{{$url}}" style="color: #fff;">Add New </a></span>
      
      <?php endif; 
     if(@$backurl!=''):?>
     
    <span class="btn btn-dark btn-gradient btn-sm pull-right ml_20" ><a class="clr_white" href="{{$backurl}}" style="color: #fff;">Go Back</a></span>  
    
                    
    <?php endif;?>
    <?php 
     if(@$export!=''):?>
    
    <a href="{{@$export}}" class="btn btn-warning">Export TO CSV</a> &nbsp; 
                
    <?php endif;?>  
    
  </div>
</div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <div class="headingbox">
        <!--@if(@Session::has('success'))-->
     <!--       <div class="alert alert-success"> {{ Session::get('success') }}</div>-->
     <!--   @endif-->
     
    <!-- @if(@Session::has('danger'))
    <div class="alert alert-danger"> {{ Session::get('danger') }}</div>
     @endif -->
     
        
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
    
        
 <script src=" {{ asset('public/admin/assets/vendor_components/jquery-3.3.1/jquery-3.3.1.js') }}"></script>
        <script  type="text/javascript"  src="{{ asset('public/js/jquery_fancybox.js') }}"></script>

    
    <!-- jQuery UI 1.11.4 -->
    <script src="{{ asset('public/admin/assets/vendor_components/jquery-ui/jquery-ui.js') }}"></script>
    
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge('uibutton', $.ui.button);
    </script>
    
    <!-- popper -->
    <script src=" {{ asset('public/admin/assets/vendor_components/popper/dist/popper.min.js') }}"></script>
    
    <!-- Bootstrap 4.0-->
    <script src="{{ asset('public/admin/assets/vendor_components/bootstrap/dist/js/bootstrap.js') }}"></script>
    
    <!-- Slimscroll -->
    <script src="{{ asset('public/admin/assets/vendor_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
    

    <script src="{{ asset('public/admin/assets/vendor_components/jquery-slimscroll/jquery.slimscroll.js') }}"></script>
    
    <!-- FastClick -->
    <script src=" {{ asset('public/admin/assets/vendor_components/fastclick/lib/fastclick.js') }}"></script>
    
    <!-- Morris.js charts -->
    <script src=" {{ asset('public/admin/assets/vendor_components/raphael/raphael.min.js') }}"></script>
    <script src=" {{ asset('public/admin/assets/vendor_components/morris.js/morris.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
    
    <!-- Fab Admin App -->
    <script src=" {{ asset('public/admin/js/template.js') }}"></script>
    
    <!-- Fab Admin dashboard demo (This is only for demo purposes) -->
    <script src=" {{ asset('public/admin/js/pages/dashboard.js') }}"></script>
    
    <!-- Fab Admin for demo purposes -->
    <script src=" {{ asset('public/admin/js/demo.js') }}"></script> 
    
    <!-- Fab admin horizontal-layout -->
    <script src=" {{ asset('public/admin/js/horizontal-layout.js') }}"></script>
    
     <script src=" {{ asset('public/admin/assets/vendor_components/datatable/datatables.min.js') }}"></script>
    
    <!-- Fab Admin for Data Table -->
    <script src=" {{ asset('public/admin/js/pages/advanced-form-element.js') }}"></script>
    <script src="{{ asset('public/admin/assets/vendor_components/ckeditor/ckeditor.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>

    
<!--<script src="{{ asset('public/js/datatables.min.js')}}"></script>
<script src="//cdn.datatables.net/plug-ins/1.10.11/sorting/date-eu.js" type="text/javascript"></script>-->

    <!-- Fab Admin for editor -->
    <script src=" {{ asset('public/admin/js/pages/editor.js') }}"></script>
    <script src="{{ asset('public/admin/js/jquery.rateit.min.js') }}"></script>
    <script>
    $('.commonClassDisableButton').attr("disabled", true);;
 
    
</script>
    <script>
            var resizefunc = [];
            
             $(function () {
        $(".check_all").click(function () {
            $('.commonClassDisableButton').removeAttr('disabled');
             $(".multiple_select_checkBox").prop('checked', $(this).prop('checked'));
             isCheckboxchecked();
        });
        
        $(".multiple_select_checkBox").click(function () {
             isCheckboxchecked();
             $('.commonClassDisableButton').attr("disabled", true);;
        });
    
        
            $(".addtooffer").click(function () {
                $(".addtooffer").submit();
        });
        
    });
        </script>
    <script>
    $(document).ready(function() {
    $('#search').on('keyup',function(){
        $value=$(this).val();
        $.ajax({
        type : 'get',
        url : '{{URL::to('admin/search')}}',
        data:{'search':$value},
        success:function(data){
            var myObj = JSON.parse(data);
            $('.tbody').html(myObj.data);
        
        }
        });
        });
     setTimeout(function(){
 $(".alert_message").hide();
  $(".alert").hide();
         }, 60000);
         
         
        $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        });
        
        
        $(document).on('click','.disableAfterCick', function () {
            
    });

});

$(document).on('keyup','.cat_url', function () {
    
        if (this.value.match(/[^a-zA-Z0-9\-]/g)) {
            var value = this.value.replace(/[^a-zA-Z0-9 \-]/g, '');
              this.value=value.replace(/\s+/g, '-');
            
            
        }
    });
    
    
    $(document).on('click','.resetModalForm', function () {
     $(".resetAbleForm").trigger("reset");
    });
    
    $(document).on('click','.showcat', function () {
        $(this).parent().parent().parent().children( ".element" ).show();
        $(this).parent().html('<i class="fa fa-plus pointer hidecat" aria-hidden="true"></i>');
     
    });
    
    $(document).on('click','.ext_product_button', function () {
                    $("#myModal").hide('hide');
    });
    
    $(document).on('click','.disableAfterClick', function () {
        
     
    });
    
    
    $(document).on('change','.offerType', function () {
         switch(this.value) {
            case '0':
                $(".brandClass").val('');
            $('.brandSelection').hide();
            $('.categorySelection').show();
            break;
            
            case '1':
                $(".catClass").val('');
                $('.brandSelection').show();
                $('.categorySelection').hide();
            break;
        
        }
  
});

$(document).on('change','.CouponAssignType', function () {

         switch(this.value) {
            case '1':
                    
                    $('.categoryBox').show();
                    $('.brandSelection').hide();
                    $('.productSelection').hide();
                  break;
            case '2':
                $(".catClass").val('');
                $(".productSelection").val('');
                $('.brandSelection').show();
                $('.categoryBox').hide();
                $('.productSelection').hide();
            break;
            case '3':
                $(".catClass").val('');
                $(".brandClass").val('');
                $('.productSelection').show();
                $('.brandSelection').hide();
                $('.categoryBox').hide();
            break;
        
        }
  
});

        $(document).on('change','.couponType', function () {
    
            
        switch(this.value) {
            case '0':
                    $(".coupon_cart").hide(); 
                    $(".coupon_dt").hide(); 
                    $(".coupon_number").hide(); 
            break;
            
            case '1':
                    $(".coupon_cart").show(); 
                    $(".coupon_dt").hide(); 
                    $(".coupon_number").hide(); 
            break;
            
            case '2':
                        $(".coupon_cart").hide(); 
                        $(".coupon_dt").show(); 
                        $(".coupon_number").hide(); 
            break;
            
            case '3':
                        $(".coupon_cart").show(); 
                        $(".coupon_dt").show(); 
                        $(".coupon_number").hide(); 
            break;
            
             case '4':
                    $(".coupon_cart").hide(); 
                    $(".coupon_dt").hide(); 
                    $(".coupon_number").show(); 
            break;
            
            case '5':
                    $(".coupon_cart").show(); 
                    $(".coupon_dt").hide(); 
                    $(".coupon_number").show(); 
            break;
            
            case '6':
                    $(".coupon_cart").hide(); 
                    $(".coupon_dt").show(); 
                    $(".coupon_number").show(); 
            break;
            
            case '7':
                    $(".coupon_cart").show(); 
                    $(".coupon_dt").show(); 
                    $(".coupon_number").show(); 
            break;
        }
        
    
  
   
});
    $(document).on('click','.show_hide', function () {
    
     if($(this).val()==0){
         $(".logistics_container").hide();
     } else{
          $(".logistics_container").show();
     }
     
    });
    
    
    
    $(document).on('click','.reset_form', function () {
 $(".form").trigger("reset");
    });
    
    $(document).on('click','.edit', function () {
            
            var role_id=$(this).attr("data-id");
            var role_name=$(this).attr("data-value");

            $('#edit_name').val(role_name);
            $('#user_role_id').val(role_id);
            
    });
    $(document).on('click','.goBack', function () {
            window.history.back();
    });
    
    
    $(document).on('keyup','.search_string', function () {
        var str=this.value;
        if(str.length>0){
            $(".searchButton").attr("disabled", false);
        } else{
            $(".searchButton").attr("disabled", true);
        }
    
    });
    $(document).on('keyup','.size2', function () {
    
        if (this.value.match(/[^0-9\-]/g)) {
            var value = this.value.replace(/[^0-9 \-]/g, '');
              this.value=value.replace(/\s+/g, '');
            
            
        }
    });
        $(document).on('click','.removeAttributes', function () {
        var attr_id=$(this).attr("attr_id");
        var attr_name=$(this).attr("attr_name");
        var html='';
                html+='<tr  id="table_row_2'+attr_id+'">';
                html+='<td>'+attr_name+'</td>';
                html+='<td><i class="fa fa-plus text-red addTolist"  attr_id="'+attr_id+'" attr_name="'+attr_name+'" aria-hidden="true"></i></td>';
                html+='</tr>';
            $('#table_row_'+attr_id).remove();
            $('.tableListItem2').append(html);          
    });
    $(document).on('click','.addTolist', function () {
        var attr_id=$(this).attr("attr_id");
        var attr_name=$(this).attr("attr_name");
        var count = $(".tableListItem").children().length;
        count++;
        var html='';
                html+='<tr  id="table_row_'+count+'">';
                html+='<input type="hidden" name="arrt_id[]" value="'+attr_id+'">';
                html+='<td>'+attr_name+'</td>';
                html+='<td><i class="fa fa-trash text-red removeAttributes"  attr_id="'+count+'" attr_name="'+attr_name+'" aria-hidden="true"></i></td>';
                html+='</tr>';
        $('#table_row_2'+attr_id).remove(); 
        $('.tableListItem').append(html);               
    });



function image_preview(event){
        

        const file = event.target.files[0];
        const  fileType = file['type'];
        const validImageTypes = ['image/gif', 'image/jpeg', 'image/jpg', 'image/bmp', 'image/png'];
        if (!validImageTypes.includes(fileType)) {
            // invalid file type code goes here.
            alert("Invalid Image");
            return false;
        }
        
        var a=(file.size);
        if(a >= 4000000) {
            alert("File Can't be more than 4 MB");
            return false;
        };

        var reader = new FileReader();
         reader.onload = function()
         {
            var nextSib = document.getElementById(event.target.id+'_preview').nextElementSibling;
            var ref = document.getElementById(event.target.id+'_preview');
            
            if(nextSib != '')
            {
                $('#'+event.target.id+'_preview').next('img').remove();
                $('#'+event.target.id+'_preview').next('i').remove();
            }
            //-- Creating Image tag --//
            var output = document.createElement('img'); 
            //--- Creating close button ---//
            var close_btn = document.createElement('i');      
            close_btn.className ="fa fa-remove text-danger";
            $(output).insertAfter(ref); 
            $(close_btn).insertAfter(output);   
            
            close_btn.addEventListener("click", function(){
                document.getElementById(event.target.id).value = "";
                $('#'+event.target.id+'_preview').next('img').remove();
                close_btn.remove();
            });

                    
            output.src = reader.result;
            output.style.height = "100px";
            output.style.width = "100px";

         }
        
         reader.readAsDataURL(event.target.files[0]);
}


$(document).on('change','#selectState', function () {
                
                 $('#selectcity option:not(:first)').remove();
                 //var state_id=$(this).val();
                 var state_id = $(this).find(':selected').data('id');
                 
            if(state_id!=''){
               
                $.ajax({
                   type:'POST',
                   async:true,
                    url:"",
                   data:{ "state_id":state_id},
                   success:function(data) {
                           
                          var response = JSON.parse(data);
                          console.log(response);
                          
                          if((response.size)>0){
                            $('#selectcity').append(response.city); 
                            $('#selectcity').addClass('custom-select');
                            //$('#selectcity').addClass('selectpicker');custom-select 
                            $('#selectcity').attr('data-live-search', 'true');
                             $('#selectcity').selectize('refresh');
                              
                          }
                         
                   }
                });
            }
            
            
            });
//////////////////////////////////////////////////////////////////////
var inner_data_url = document.location.origin+'/serenity/admin/';
$(document).on('click','.status_checks',function(){

    var data=$(this).attr('rel');
    var myarr = data.split("__");
    var url = inner_data_url.concat(myarr[0]);
    var updateColumn=$(this).attr('col');
    var status = ($(this).hasClass("btn-success")) ? '0' : '1';
    var msg = (status=='0')? 'Deactivate' : 'Activate';
      if(confirm("Are you sure to "+ msg)){
        var current_element = $(this);
        $.ajax({
          type:"POST",
          url: url,
    data: {id:$(current_element).attr('data'),status:status,tableName:myarr[1],updateColumn:updateColumn},
          success: function(data)
          {   

 location.reload();



          }



        });



      }      



    });



    



  $(".del").click(function() {



        var data=$(this).attr('rel');



        var myarr = data.split("__");



        var url = inner_data_url.concat(myarr[0]);



        if(confirm('Are you sure delete this data?'))



      {



        



        var id = $(this).attr('id');



        var url = url;



         $.ajax({



            url :url,



            type: "POST",



            dataType: "JSON",



            data: {id:id,tableName:myarr[1]},



            success: function(data)



            {



           
location.reload();


            },

 

        });



        }



    }); 
    </script>



<script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />
<script>
  $(".searchdata").click(function() {
      var searchdata=$(this).val();
      if(searchdata!=''){
        $('.remveattr').removeAttr('disabled');
        
      }else{
        $('.remveattr').attr("disabled", true);;
      }
    
    });
    /*$('.catTreeSeletcted').on('change', function() {
   $('.catTreeSeletcted').not(this).prop('checked', false);
});*/
    
    
</script>
<script type="text/javascript">
$(function() {

  $('input[name="daterange"]').daterangepicker({
      autoUpdateInput: false,
      locale: {
          cancelLabel: 'Clear',
          format: 'DD-MM-YYYY'
      }
  });

  $('input[name="daterange"]').on('apply.daterangepicker', function(ev, picker) {
      $(this).val(picker.startDate.format('DD-MM-YYYY') + '/' + picker.endDate.format('DD-MM-YYYY'));
      $('.daterange').trigger('change');
  });

  $('input[name="daterange"]').on('cancel.daterangepicker', function(ev, picker) {
      $(this).val('');
  });

});
</script>
 <?php if(@$page_details['title']){ ?>
    @include('admin.includes.Common_search_and_delete')
    <?php } ?> 
 
<!--
<link rel="stylesheet" href=" {{ asset('public/admin/css/imageuploadify.min.css') }}">
<script src="{{ asset('public/js/validateform.js') }}"></script> 
<script type="text/javascript" src="{{ asset('public/admin/js/imageuploadify.min.js') }}"></script>

<script type="text/javascript" src="{{ asset('public/admin/js/jsLists.min.js') }}"></script>-->
<script type="text/javascript">
/**
 * Image Required Validation  start 
 */
var img_el = document.getElementsByClassName("input_color_img");
const arr_el_imgs = Array.from(img_el);
arr_el_imgs.forEach(CheckImg);
function CheckImg(item, index) {
//console.log('Item:'+item+' value:'+index);

    item.onchange = function(){     
        var x = document.querySelectorAll('.color_image_form .input_color_img');
        const imgs = Array.from(x);
        imgs.forEach(isEmpty);
    };
}


/**
 * Image Required Validation  end @sudhir 
 */


    $(document).ready(function() {
        $('input[type="file"]').imageuploadify();
    });
    JSLists.applyToList('simple_list', 'ALL');
    
    
</script>
<!--Nestable js -->
    <script src="{{ asset('public/admin/assets/vendor_components/nestable/jquery.nestable.js') }}"></script>
    
    <script type="text/javascript">
        $(document).ready(function () {
            
            // Nestable
            var updateOutput = function (e) {
                var list = e.length ? e : $(e.target)
                    , output = list.data('output');
                if (window.JSON) {
                    output.val(window.JSON.stringify(list.nestable('serialize'))); //, null, 2));
                }
                else {
                    output.val('JSON browser support required for this demo.');
                }
            };
            $('#nestable').nestable({
                group: 1
            }).on('change', updateOutput);
            updateOutput($('#nestable').data('output', $('#nestable-output')));
            $('#nestable-menu').on('click', function (e) {
                var target = $(e.target)
                    , action = target.data('action');
                if (action === 'expand-all') {
                    $('.dd').nestable('expandAll');
                }
                if (action === 'collapse-all') {
                    $('.dd').nestable('collapseAll');
                }
            });
            
            $('#nestable-menu').nestable();
        });
    </script>

    <script>
       
        $(document).ready(function () {
            
            $('.dd-item').addClass('dd-collapsed');
            $('[data-action="collapse"]').css('display','none');
            $('[data-action="expand"]').css('display','block');
            $('.imageParentDiv').append('<?php echo @$page_details["return_data"]["image_html"];?>');
        });
        
            $(".sOrdersearch").click(function () {

                

                var currentPath="{{@$page_details['search_route']}}";

              

               

                    var str=$('.search_string').val();

                    var daterange=$('.daterange').val();

                    var vendororder=$('.vendororder').val();

                  

                   

                    if(daterange==''){

                        daterange='All';   

                    } else{

                        var res = daterange.split("/");

                        var daterange=res[0]+"."+res[1];

                    }

                     if(str!=''){

                        str=str;   

                    }else{

                      

                       str='All';   

                    }

                    

                   /*  var selectedBrands = $('#orderBrandId').val();

        var selectedBrandsString = selectedBrands.toString();

        if(selectedBrandsString==''){

         selectedBrandsString='All';   

        }

        

        

           var ProductCategory=$('#order_category_id').val();

        if(ProductCategory==''){

         ProductCategory='All';   

         

        }*/

                  

                 var ProductCategory='All';  var selectedBrandsString='All';  //+"/"+selectedBrandsString+"/"+ProductCategory

                    

                  currentPath+="/"+str+"/"+daterange+"/"+ProductCategory;

                  window.location.replace(currentPath);

                    

            });
    </script>
</body>
</html>
    
