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

<body id="top" class="special-page">
  <div id="container">
    <div id="header-surround">
      <header id="header">
        <img alt="Grape" class="logo" src="{{asset('theme/admin/build/img/logo.png')}}" width="200" height="43">
        <div id="info-dialog" style="display: none;" title="About">
        </div>
      </header>
    </div>

    
       
    <!-- start content -->
  <div id="container">
    <section id="login-box">
      <div class="block-border">
        <div class="block-header">
                    
          <h1>Login</h1>
        </div>
        <div class="clearfix"></div>


        <form  class="block-content form" role="form" method="POST" action="{{ route('login') }}">
        {{ csrf_field() }}
        <div class="clearfix"><br></div>
        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
          <p class="inline-small-label"><label for="username">Username</label> 
          <input id="email" type="email" class="form-control" name="email"  placeholder="Email" value="{{ old('email') }}" required>
            @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif</p>
        </div>
        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
          <p class="inline-small-label"><label for="password">Password</label>                         
          <input id="password" type="password" class="form-control" placeholder="Password" name="password" required>
            @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif</p>
        </div>
        <div class="clear"></div>
          <div class="block-actions">
              <ul class="actions-left">
                  <li>
                      {!! Form::submit('Login', ['class' => 'button btn-primary']) !!}
                  </li>
              </ul>
          </div>
        </form>
      </div>
    </section>
  </div>

    <!-- end content -->

    <!-- footer content -->
  </div>
  <script src="{{asset('theme/admin/build/ajax/libs/jquery/1.6.2/jquery.min.js')}}">
  </script> 
<!--
  <script>
  window.jQuery||document.write('<script src="{{asset('theme/admin/build/js/libs/jquery-1.6.2.min.js')}}"><\/script>');
  </script> 
  <script defer src="{{asset('theme/admin/build/js/library.js')}}">
  </script> 
  -->
  <script src="{{asset('theme/admin/build/js/library.js')}}">
  </script>
      <!-- iCheck -->
    <script>
        $(function () {
            // flash auto hide
            $('#flash-msg .alert').not('.alert-danger, .alert-important').delay(6000).slideUp(500);
        })
    </script>
    @stack('scripts')
    
    <!-- Custom Theme Scripts -->
    <script src="{{asset('theme/admin/build/js/custom.min.js')}}"></script>
</body>
</html>

