<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
  
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Knowledge Management</title>

    <!-- Bootstrap -->
    <link href="{{asset('theme/admin/vendors/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{asset('theme/admin/vendors/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{asset('theme/admin/vendors/nprogress/nprogress.css')}}" rel="stylesheet">
    <!-- iCheck -->
    <link href="{{asset('theme/admin/vendors/iCheck/skins/flat/green.css')}}" rel="stylesheet">
  
    <!-- bootstrap-progressbar -->
    <link href="{{asset('theme/admin/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css')}}" rel="stylesheet">
    <!-- JQVMap -->
    <link href="{{asset('theme/admin/vendors/jqvmap/dist/jqvmap.min.css')}}" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="{{asset('theme/admin/vendors/bootstrap-daterangepicker/daterangepicker.css')}}" rel="stylesheet">
   
    <link href="{{asset('theme/admin/vendors/selectize/css/selectize.bootstrap3.css')}}" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="{{asset('theme/admin/build/css/custom.min.css')}}" rel="stylesheet">

    <!-- Custom Theme Style -->

    <link href="{{asset('theme/admin/build/css/library.css')}}" rel="stylesheet">
    <script src="{{asset('theme/admin/build/js/libs/modernizr-2.0.6.min.js')}}"></script>

    @yield('styles')
  </head>

<body id="top">
  <div id="container">
    <div id="header-surround">
      <header id="header">
        <img alt="Bappeda Knowledge Management" class="logo" src="{{asset('theme/admin/build/img/logo.png')}}" width="200" height="43">
        <div class="divider-header divider-vertical"></div><a href="javascript:void(0);" onclick="$('#info-dialog').dialog({ modal: true });"><span class="btn-info"></span></a>
        <div id="info-dialog" style="display: none;" title="About">
          <p>test ting apa aja</p>
          <p></p>
        </div>
        <ul class="toolbox-header">
        </ul>
        <div id="user-info">

          <span class="messages"><a href="javascript:void(0);">Selamat Datang, {{$userInfo['userName']}}</a> 
          </span> 
          <a class="button red" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="glyphicon glyphicon-log-out"></i> Keluar</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>        

          
        </div>
      </header>
    </div>

    <div class="fix-shadow-bottom-height"></div>
    
    <aside id="sidebar">
     
      <section id="login-details">
      
        
        
          <ul class="dropdown-username-menu">
            <li>
              <a href="{{route('dashboard.profile_index')}}">Profile</a>
            </li>
            <li>
            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
              Logout</a><form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
            </li>
          </ul>
        <div class="clearfix"></div>
      </section>

            <!-- sidebar menu -->
            @include('shared._menu_admin')
            <!-- /sidebar menu -->
    </aside>
       
    <!-- start content -->
    @yield('content')  
    <!-- end content -->

    <!-- footer content 
    <footer id="footer">
      <div class="container_12">
        <div class="grid_12">
          <div class="footer-icon align-center">
            <a class="top" href="#top"></a>
          </div>
        </div>
      </div>
    </footer>-->
  </div>
  <script src="{{asset('theme/admin/build/ajax/libs/jquery/1.6.2/jquery.min.js')}}">
  </script>

<!--
  <script src="{{asset('theme/admin/build/ajax/libs/jquery/3.1.1/jquery.min.js')}}">


  <script>
  window.jQuery||document.write('<script src="{{asset('theme/admin/build/js/libs/jquery-1.6.2.min.js')}}"><\/script>');
  </script> 
  <script defer src="{{asset('theme/admin/build/js/library.js')}}">
  </script> 
  -->
   <script src="{{asset('theme/admin/build/js/library.js')}}"></script>

  <!--[if lt IE 7 ]><script src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.3/CFInstall.min.js"></script> <script>window.attachEvent("onload",function(){CFInstall.check({mode:"overlay"})});</script><![endif]--><!-- Mirrored from envato.stammtec.de/themeforest/grape/dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 19 Sep 2017 05:22:57 GMT -->

  <script>
        $(function () {
            // flash auto hide
            $('#flash-msg .alert').not('.alert-danger, .alert-important').delay(6000).slideUp(500);
        })
  </script>
  @stack('scripts')
    
    <!-- Custom Theme Scripts 
    <script src="{{asset('theme/admin/build/js/custom.min.js')}}"></script>  -->
</body>
</html>

