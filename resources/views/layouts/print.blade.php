<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">

<head>
  <meta charset="utf-8">
  <title>@yield('title')</title>

  <!-- Normalize or reset CSS with your favorite library -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/3.0.3/normalize.css">

  <!-- Load paper.css for happy printing -->
<style type="text/css">
@page { margin: 0 }
body { margin: 0 }
.sheet {
  margin: 0;
  overflow: hidden;
  position: relative;
  box-sizing: border-box;
  page-break-after: always;
}

/** Paper sizes **/
body.A3           .sheet { width: 297mm; height: 419mm }
body.A3.landscape .sheet { width: 420mm; height: 296mm }
body.A4           .sheet { width: 210mm; }
body.A4.landscape .sheet { width: 297mm; height: 209mm }
body.A5           .sheet { width: 148mm; height: 209mm }
body.A5.landscape .sheet { width: 210mm; height: 147mm }

/** Padding area **/
.sheet.padding-10mm { padding: 10mm }
.sheet.padding-15mm { padding: 15mm }
.sheet.padding-20mm { padding: 20mm }
.sheet.padding-25mm { padding: 25mm }

/** For screen preview **/
@media screen {
  body { background: #e0e0e0 }
  .sheet {
    background: white;
    box-shadow: 0 .5mm 2mm rgba(0,0,0,.3);
    margin: 5mm;
  }
}

/** Fix for Chrome issue #273306 **/
@media print {
           body.A3.landscape { width: 420mm }
  body.A3, body.A4.landscape { width: 297mm }
  body.A4, body.A5.landscape { width: 210mm }
  body.A5                    { width: 148mm }
}
</style>
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

    
    <!-- google fonts  -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Tangerine' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Helvetica' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Calibri' rel='stylesheet' type='text/css'>
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{asset('theme/front/img/favicon.ico')}}" type="image/x-icon">

  <!-- Set page size here: A5, A4 or A3 -->
  <!-- Set also "landscape" if you need -->
  <style>@page { size: A4.landscape }</style>
</head>

<!-- Set "A5", "A4" or "A3" for class name -->
<!-- Set also "landscape" if you need -->
<body class="A4.landscape">

  <!-- Each sheet element should have the class "sheet" -->
  <!-- "padding-**mm<!-- Each sheet element should have the class "sheet" -->
<!-- "padding-**mm" is optional: you can set 10, 15, 20 or 25 -->
<section class="sheet padding-10mm">
  @yield('content')
  <!-- Write HTML just like a web page -->
 
  
</section>




</body>

</html>
