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
  <section id="priceSection">
    <div class="top-bar3">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
          <div class="client_title">
            <h3> <span>Laporan</span></h2>
            <br><br><br><br><br>
          </div>
          <Start Plan area 
          <div class="pricearea">
            <ul class="price_nav wow bounceIn">               
              @foreach($report as $item) 
              <li>
                <!--h5>{{$item->PostDetail['0']['title']}}</h5></p>-->
                <!--a class="get_button" href="{{ route('detail',[$item->id,$item->PostDetail['0']['slug']]) }}">Selanjutnya</a>-->
                  <div class="panel-body">
                      <div class="col-md-6">
                        <a target="_blank" href="{{ route('detail',[$item->id,$item->PostDetail['0']['slug']]) }}" class="thumbnail">
                        @if(empty($item->featured_img)) 
                        <img alt="img" src="{{asset('theme/front/img/f_default_260x180.png')}}">                        
                        @else                                      
                        <img alt="img" src="{{asset('content/upload/'.$item->featured_img)}}" >
                        @endif 
                        </a> 
                      </div>
                     <a target="_blank" href="{{ route('detail',[$item->id,$item->PostDetail['0']['slug']]) }}">
                      <p style="text-align:left;"><strong>{{$item->PostDetail['0']['title']}}</strong></p></a>     
                  </div> 
             
              </li>
           @endforeach
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>
<!-- End image editing  -->
@endsection