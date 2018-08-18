<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--title>Kotaku : Kota Tanpa Kumuh</title>-->
    <title>@yield('title')</title>
    @stack('meta')

    <!-- Bootstrap -->
    <link href="{{asset('theme/front/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- for fontawesome icon css file -->
    <link href="{{asset('theme/front/css/font-awesome.min.css')}}" rel="stylesheet">
    <!-- superslides css -->
    <link rel="stylesheet" href="{{asset('theme/front/css/superslides.css')}}">
    <!-- for content animate css file -->
    <link rel="stylesheet" href="{{asset('theme/front/css/animate.css')}}">    
    <!-- slick slider css file -->
    <link href="{{asset('theme/front/css/slick.css')}}" rel="stylesheet">        
    <!-- website theme color file -->   
     <link id="switcher" href="{{asset('theme/front/css/themes/red-theme.css')}}" rel="stylesheet">    
    <!-- main site css file -->    
    <link href="{{asset('theme/front/css/style.css')}}" rel="stylesheet">    

    <link rel="stylesheet" id="camera-css"  href="{{asset('theme/front/css/camera.css')}}" type="text/css" media="all">
    
    @stack('style')

    <!-- google fonts  -->  
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>    
    <link href='http://fonts.googleapis.com/css?family=Tangerine' rel='stylesheet' type='text/css'>  
    <link href='http://fonts.googleapis.com/css?family=Helvetica' rel='stylesheet' type='text/css'>    
    <link href='http://fonts.googleapis.com/css?family=Calibri' rel='stylesheet' type='text/css'>    
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{asset('theme/front/img/favicon.ico')}}" type="image/x-icon">  
  
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js')}}"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js')}}"></script>
    <![endif]-->
  </head>
<body>
  <?php //dd($navs);?>
  <header id="header">

  <!-- Preloader -->
  <!--div id="preloader">
    <div id="status">&nbsp;</div>
  </div>-->
 
  <!-- End Preloader -->   
  <a class="scrollToTop" href="#"><i class="fa fa-angle-up"></i></a>


<!-- start navbar -->
  <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="top-bar">
            <div class="container">
                <div class="row">

                    <div class="col-sm-6 col-xs-10">
                        <table border='0' width="100%" height="30px">
                          <tr>
                            <td>
                            <div class="top-number"><br>{{Helper::setDateFormat("D, j M Y")}}</div><br>
                            </td>
                          </tr>
                          <tr>
                            <td>
                            @if(Auth::user())                        
                            <div class="top-number"><br>Selamat Datang, <b>{{Auth::user()->name}}</b></div>
                            @endif
                            </td>
                          </tr>
                        </table>
                    </div>

                    <div class="col-sm-6 col-xs-10">
                       <div class="social">
                        <table border='0' width="100%" height="30px">
                          <tr>
                            <td>
                                <form id='search-form' class="submitphoto_form" method="POST" action="{{ route('post_search') }}" >
                                  {{ csrf_field() }}                            
                                  <input type="text" name="key" placeholder="Search" size="30%" style="height:30px;"></input> 
                                </form>
                            </td>
                            <td>&nbsp;&nbsp;
                                <a href="{{ route('post_search') }}" onclick="event.preventDefault(); document.getElementById('search-form').submit();"><i class="fa fa-search"></i></a>&nbsp;&nbsp;                                
                                @include('shared._lang')
                            </td>
                          </tr>
                        </table>
                               
                                
                       </div>
                    </div>


                </div>
            </div><!--/.container-->
        </div><!--/.top-bar-->

    @if(!empty($runtext))
    <div class="top-bar1"><marquee onmouseover="this.stop()" onmouseout="this.start()" direction="left">{!! $runtext !!}</marquee></div><!--/.top-bar-->
    @endif
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <!--  <a class="navbar-brand" href="index.html">WpF <span>BGness</span></a> -->

        <a class="navbar-brand" href="index.html"><img src="{{asset('theme/front/img/logo.png')}}" alt="logo"></a> 
      </div>
      <div id="navbar" class="navbar-collapse collapse navbar_area">          
        @include('shared._menu_front',['menu'=>$menu])
      </div><!--/.nav-collapse -->
    </div>
  </nav>
  <!-- End navbar -->
</header>



@yield('content') 


  <!-- start footer -->
   <!-- start footer -->
  <footer id="footer">
    <div class="container">
      <div class="row">
        <div class="col-ld-12 col-md-12 col-sm-12">
          <div class="footer_top">
            <div class="row">

              <div class="col-ld-3 col-md-3 col-sm-3" align="center">
                <div class="single_footer_top">
                  <h2>Tweet terbaru </h2>
                  <ul>
                    <li> 
                      <a class="twitter-timeline" href="https://twitter.com/kotakunasional" data-width="300" data-height="260">A Twitter List by TwitterDev</a> 
                      <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
                    </li>
                  </ul>
                </div>
              </div>

              <div class="col-ld-3 col-md-3 col-sm-3">
                <div class="single_footer_top" align="center">
                  <h2>Kontak Kami</h2>
                    <div class="gmap">
                        <iframe width="100%" height="400" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=Jl.+Penjernihan+1+No.19+F,+Bend.+Hilir,+Tanah+Abang,+Kota+Jakarta+Pusat,+Daerah+Khusus+Ibukota+Jakarta+10210&amp;aq=&amp;sll=-6.201722,106.810543&amp;sspn=-6.201722,106.810543&amp;ie=UTF8&amp;hq=&amp;hnear=l.+Penjernihan+1+No.19+F,+Bend.+Hilir,+Tanah+Abang,+Kota+Jakarta+Pusat,+Daerah+Khusus+Ibukota+Jakarta+10210&amp;t=m&amp;z=17&amp;ll=-6.201722,106.8105431&amp;output=embed"></iframe>
                    </div>
                </div>
              </div>

              <div class="col-ld-3 col-md-3 col-sm-3">
                <div class="single_footer_top">
                  <h2>Pengaduan </h2>
                  <ul>
                    <li><a href="{{route('messages')}}"><img src="{{asset('theme/front/img/sms-pengaduan.png')}}" alt="WA/SMS Pengaduan" width="230"/></a></li>
                    <li><a href="{{route('complaint')}}"><img src="{{asset('theme/front/img/pengaduan-online.png')}}" alt="Pengaduan Online" width="230"/></a></li>
                  </ul>
                </div>
              </div>
              
              <div class="col-ld-3 col-md-3 col-sm-3">
                <div class="single_footer_top">
                  <h2>Links </h2>
                  <ul>
                    <li><a href="#">Forum</a></li>
                    <li><a href="{{url('/page/110')}}">FAQ</a></li>
                    <li><a href="{{route('f_testi')}}">Testimonial</a></li> 
                    <li><a href="{{url('/page/106')}}">Lowongan</a></li>
                    <li><a href="{{url('/page/108')}}">Pengumuman</a></li>
                    <li><a href="{{route('index_gallery') }}">Galeri</a></li>
                  </ul>
                </div>
                <div class="single_footer_top">
                  <h2>Social Links </h2>
                  <ul class="social_nav">
                    <li><a target="_blank" href="http://www.facebook.com/kmp.kotaku"><i class="fa fa-facebook"></i></a></li>
                    <li><a target="_blank" href="http://twitter.com/kotakunasional"><i class="fa fa-twitter"></i></a></li>
                    <!--li><a href="#"><i class="fa fa-youtube"></i></a></li>-->
                    <li><a target="_blank" href="http://www.instagram.com/kotaku.nasional"><i class="fa fa-instagram"></i></a></li>
                  </ul>
                </div>
              </div>

            </div>
          </div>
        </div>        
        <div class="col-lg-12 col-md-12 col-sm-12">
          <div class="footer_bottom">
            <div class="copyright">
              <p>All right reserved </p>
            </div>
            <div class="developer">
              <p>Designed By BIOS</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <!-- End footer -->
  <!-- End footer -->

  
 
  
  <!-- jQuery Library -->
  <script src="{{asset('theme/front/js/jquery.lib.min.js')}}"></script>
  <!-- For content animatin  -->
  <script src="{{asset('theme/front/js/wow.min.js')}}"></script>
  <!-- bootstrap js file -->
  <script src="{{asset('theme/front/js/bootstrap.min.js')}}"></script> 
  <!-- superslides slider -->
  <script src="{{asset('theme/front/js/jquery.easing.1.3.js')}}"></script>
  <script src="{{asset('theme/front/js/jquery.animate-enhanced.min.js')}}"></script>
  <script src="{{asset('theme/front/js/jquery.superslides.js')}}" type="text/javascript" charset="utf-8"></script>
  <!-- slick slider js file -->
  <script src="{{asset('theme/front/js/slick.min.js')}}"></script>
  <script src="{{asset('theme/front/js/custom.js')}}"></script>

  <script>
        $(function () {
            // flash auto hide
            $('#flash-msg .alert').not('.alert-danger, .alert-important').delay(6000).slideUp(500);
        })
    </script>

  <!-- Google map -->
  <!--script src="https://maps.googleapis.com/maps/api/js"></script>
  <script src="{{asset('theme/front/js/jquery.ui.map.js')}}"></script>-->

  @stack('scripts')
  <!-- custom js file include -->
      
  </body>
</html>