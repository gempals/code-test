@extends('layouts.front') 
@section('title', 'Kotaku : Kota Tanpa Kumuh') 
@section('content') 
  <!-- start banner area -->
  <section id="imgbanner">  
    <h2>Warta Berita</h2>     
  </section>
  <!-- End banner area -->
  <!-- start image editing  -->
  <section id="blogArchive">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-12">
         <div class="blogArchive_area">
                   <!-- start single archive post -->
          @foreach($data as $item)
          <div class="single_archiveblog wow fadeInDown">
            <div class="archiveblog_left">
              @if(!empty($item->featured_img))
              <img class="author_img" src="{{asset('content/upload/'.$item->featured_img)}}" alt="img">
              @else

              <img class="author_img" src="{{asset('theme/front/img/f_default.png')}}" alt="img" style="border:dashed 2px #BEBBBA;">
              @endif
              
            </div>          

            <div class="archiveblog_right">
              <h2>
                <a class="read_more" href="{{route('detail',[$item->id,$item->PostDetail['0']['slug']])}}">
                    {{$item->PostDetail['0']['title']}}
                </a>
              </h2>
              <div class="post_commentbox">
                <a href="#"><i class="fa fa-tags"></i>Technology</a>
                <a href="#"><i class="fa fa-comments"></i>Comments</a>             
              </div>              
              {!! $item->PostDetail['0']['summary'] !!}
               <a class="read_more" href="{{route('detail',[$item->id,$item->PostDetail['0']['slug']])}}">Selengkapnya<i class="fa fa-long-arrow-right"></i></a>
            </div>
          </div>
          <!-- End single archive post -->
          @endforeach
          
          <!-- End single archive post -->
         </div>      
          {!! $data->render() !!}
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12">
         <div class="blog_sidebar">
         <!-- Start single side bar -->
        

        <!-- Start single side bar -->
        
          <!-- Start single side bar pra kata tiap berita -->
          <div class="single_sidebar">
            <h2>{{ __('front.announ')}}</h2>
            <ul class="catg_nav">
                Bagi rekan pelaku dan pemerhati KOTAKU yang ingin mengirimkan tulisan partisipatif, silakan kirim berita/artikel/cerita/feature terkait kegiatan KOTAKU ke Redaksi:<br>
                <b><a href="mailto:kotaku.nasional@gmail.com?subject=Questions" title=""><font color="#0000FF">kotaku.nasional@gmail.com</font></a></b><br>
                Tulisan yang dikirim <b>berformat document word (.doc) disertai foto dan keterangan foto.</b> Foto sebaiknya berformat .jpg atau .bmp, dikirimkan <b>via email dan dilampirkan terpisah dari dokumen tulisan</b> (tidak di dalam dokumen). Font tulisan Times New Roman ukuran 12, spasi single, 1 - 2 layar atau maksimal 2.500 karakter (tanpa spasi).<br>
                Atau, dapat langsung dikirim <b>melalui web (klik "kirim")</b>, syaratnya, Anda sudah terdaftar sebagai <b>member web KOTAKU.</b> Selanjutnya, bila tulisan tersebut dianggap layak, maka tunggu tanggal tayangnya di web KOTAKU.
            </ul>
            <h2></h2>
          </div>
          <!-- Start single side bar -->
          <!--div class="single_sidebar">
            <h2>{{ __('front.category')}}</h2>
            <ul class="catg_nav">
              <li><a href="#">Business</a></li>
              <li><a href="#">Technology</a></li>
              <li><a href="#">News</a></li>
              <li><a href="#">Exclusive</a></li>
              <li><a href="#">Corporate</a></li>
            </ul>
          </div>-->
          <!-- Start single side bar -->
         
          <!-- Start single side bar -->
          <div class="single_sidebar">
            <h2>{{ __('front.news_arch')}}</h2>
            <div class="blog_archive">
             <form>
               <select>
                 <option value="">Berita Archive</option>
                 <option value="">October(20)</option>
               </select>
             </form>
           </div>
          </div>
          <!-- Start single side bar -->
         
         </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End image editing  -->

  @endsection