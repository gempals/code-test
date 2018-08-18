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
  <style type="text/css">
    body {
      background: #e3e5e7;
    }
    #container>#main {
      margin-left: 0px;
    }
    ul.shortcut-list li {
      background: url("../img/misc/lists/shortcut-list-bg.png") repeat-x scroll top left #d3d3d3;
      border: 1px solid #bcbcbc;
      float: left;
      overflow: hidden;
      margin: 10px 5px;
      cursor: pointer;
      border-radius: 5px 5px 5px 5px;
      /*width: 150px;*/
    }

    ul.shortcut-list li img {
      display: block;
      margin: 0 auto;
      /*padding-bottom: 10px;*/
      overflow: hidden
    }
    
      
  </style>
  <div id="container">
    <div id="header-surround">
      <header id="header">
        <img alt="Bappeda Knowledge Management" class="logo" src="{{asset('theme/admin/build/img/logo.png')}}">
        <div class="divider-header divider-vertical"></div><a href="javascript:void(0);" onclick="$('#info-dialog').dialog({ modal: true });"><span class="btn-info"></span></a>
        <div id="info-dialog" style="display: none;" title="About">
          <p>test ting apa aja</p>
          <p></p>
        </div>
        <ul class="toolbox-header">
<!--  toolbox header ( icon user on top --
          <li>
            <a class="toolbox-action" href="javascript:void(0);" rel="tooltip" title="Create a User"><span class="i-24-user-business"></span></a>
            <div class="toolbox-content">
              <div class="block-border">
                <div class="block-header small">
                  <h1>Create a User</h1>
                </div>
                <form action="#" class="block-content form" id="create-user-form" method="post" name="create-user-form">
                  <div class="_100">
                    <p><label for="username">Username</label><input class="required" id="username" name="username" type="text" value=""></p>
                  </div>
                  <div class="_50">
                    <p class="no-top-margin"><label for="firstname">Firstname</label><input class="required" id="firstname" name="firstname" type="text" value=""></p>
                  </div>
                  <div class="_50">
                    <p class="no-top-margin"><label for="lastname">Lastname</label><input class="required" id="lastname" name="lastname" type="text" value=""></p>
                  </div>
                  <div class="clear"></div>
                  <div class="block-actions">
                    <ul class="actions-left">
                      <li>
                        <a class="close-toolbox button red" href="javascript:void(0);" id="reset">Cancel</a>
                      </li>
                    </ul>
                    <ul class="actions-right">
                      <li><input class="button" type="submit" value="Create the User"></li>
                    </ul>
                  </div>
                </form>
              </div>
            </div>
          </li>
          <li>
            <a class="toolbox-action" href="javascript:void(0);" rel="tooltip" title="Write a Message"><span class="i-24-balloon"></span></a>
            <div class="toolbox-content">
              <div class="block-border">
                <div class="block-header small">
                  <h1>Write a Message</h1>
                </div>
                <form action="#" class="block-content form" id="write-message-form" method="post" name="write-message-form">
                  <p class="inline-mini-label"><label for="recipient">Recipient</label> <input class="required" name="recipient" type="text"></p>
                  <p class="inline-mini-label"><label for="subject">Subject</label> <input name="subject" type="text"></p>
                  <div class="_100">
                    <p class="no-top-margin"><label for="message">Message</label>
                    <textarea class="required" cols="40" id="message" name="message" rows="5"></textarea></p>
                  </div>
                  <div class="clear"></div>
                  <div class="block-actions">
                    <ul class="actions-left">
                      <li>
                        <a class="close-toolbox button red" href="javascript:void(0);" id="reset2">Cancel</a>
                      </li>
                    </ul>
                    <ul class="actions-right">
                      <li><input class="button" type="submit" value="Send Message"></li>
                    </ul>
                  </div>
                </form>
              </div>
            </div>
          </li>
          <li>
            <a class="toolbox-action" href="javascript:void(0);" rel="tooltip" title="Create a Folder"><span class="i-24-folder"></span></a>
            <div class="toolbox-content">
              <div class="block-border">
                <div class="block-header small">
                  <h1>Create a Folder</h1>
                </div>
                <form action="#" class="block-content form" id="create-folder-form" method="post" name="create-folder-form">
                  <p class="inline-mini-label"><label for="folder-name">Name</label> <input class="required" name="folder-name" type="text"></p>
                  <div class="block-actions">
                    <ul class="actions-left">
                      <li>
                        <a class="close-toolbox button red" href="javascript:void(0);" id="reset3">Cancel</a>
                      </li>
                    </ul>
                    <ul class="actions-right">
                      <li><input class="button" type="submit" value="Create Folder"></li>
                    </ul>
                  </div>
                </form>
              </div>
            </div>
          </li>
<!--  toolbox header ( icon user on top -->

        </ul>
        <div id="user-info">

          <span class="messages"><a href="javascript:void(0);">Selamat Datang, {{$userInfo['userName']}} [ {{$userInfo['job']}} {{$userInfo['div']}} ]&nbsp;&nbsp;</a> 
          </span> 
          <a class="button red" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="glyphicon glyphicon-log-out"></i> Keluar</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>        

          
        </div>
      </header>
    </div>

    <div class="fix-shadow-bottom-height"></div>
    
    <aside id="sidebar">
      <div id="search-bar">
        <form action="{{route('files.post_search')}}" id="search-form" method="post" name="search-form">

          <input autocomplete="off" id="query" name="query" placeholder="Search" type="text" value="">
          {{ csrf_field() }}
        </form>
      </div>
      

            <!-- sidebar menu -->
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

