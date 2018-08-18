@extends('layouts.front') 
@section('title', 'Kotaku : Kota Tanpa Kumuh') 
@section('content') 
<!-- Preloader -->
<!-- start banner area -->
  <section id="imgbanner">
    <?php $name = "name_".$locale?>  
    <h2>{{$data->Category[$name]}}</h2>     
  </section>
<!-- End banner area -->
<!-- start image editing  -->
<section id="blogArchive">
<div class="container">
	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-12">
			<div class="blogArchive_area">
				<!-- start single archive post -->
	            <div class="archiveblog_center">
	              <h2>{{$data->PostDetail['0']['title']}}</h2>
	              <div class="post_commentbox">
	              </div>
	              {!! $data->PostDetail['0']['content'] !!}              
	            </div>
				<!-- End single archive post -->
			</div>
		</div>
		<div class="col-lg-4 col-md-4 col-sm-12">
			<div class="blog_sidebar">
				<!-- Start single side bar -->
	          <div class="single_sidebar">
	            <h2>{{ __('front.archive')}}</h2> <!-- menu 1 -->
				<ul class="catg_nav">
					<li>
						<a href="#">Progres SP2D Online</a>
					</li>
				</ul>
	          </div>
				<!-- end single side bar -->
				<!-- Start single side bar -->
	          <div class="single_sidebar">
	            <h2>{{ __('front.archive')}}</h2> <!-- menu 2 -->
				<ul class="catg_nav">
					<li>
						<a href="#">Progres SP2D Online</a>
					</li>
				</ul>
	          </div>
				<!-- end single side bar -->
				<!-- Start single side bar -->
	          <div class="single_sidebar">
	            <h2>{{ __('front.archive')}}</h2> <!-- menu 3 -->
				<ul class="catg_nav">
					<li>
						<a href="#">Progres SP2D Online</a>
					</li>
				</ul>
	          </div>
				<!-- end single side bar -->
			</div>
		</div>
	</div>
</div>
</section>
<!-- End image editing  -->
@endsection