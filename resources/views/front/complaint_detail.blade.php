@extends('layouts.front') 
@section('title', 'Kotaku : Kota Tanpa Kumuh') 
@section('content') 
 <!-- start banner area -->
  <section id="imgbanner">
    <?php //$name = "name_".$locale?>  
    <h2>Pengaduan On-Line</h2>     
  </section>
  <!-- End banner area -->

  <!-- start image editing  -->
  <section id="blogArchive">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-12">
         <div class="blogArchive_area">
         <!-- start single archive post -->
            <div class="single_archiveblog">                           

              <div>
                <h2 style='color:#ee4532'>{{$data_main['title']}}</h2>
                <div class="post_commentbox">
                  <span>{{$data_main['User']['name']}}</span>            
                  <span>{{date('M j,Y',strtotime($data_main['created_at']))}}</span>            
                </div>
                 {!! $data_main['content'] !!}
              </div>
              
              <!-- komentar -->
              <?php $no = 1;?>
              @foreach($data as $item)
              <div class="contact_left wow fadeInLeft">
                <h4>Tanggapan {{$no}}</h4>

                   Posted by <a href="#">{{$item->user['name']}}</a> <span>|</span>{{ $item->created_at->toFormattedDateString() }}<span>|</span>
                
                <hr>
                
                <div class="post_commentbox">
                    <ol>
                       <li>
                            <div>
                                
                                {!! $item->content !!}
                            </div>                           
                       </li>                                                     
                    </ol>
                </div>                        
              </div>              
              <?php $no++;?>
              @endforeach


              @if (Auth::guest())

              @else
                <div class="contact_left wow fadeInLeft">
                <h4>Balas Pesan</h4>
                <form class="submitphoto_form" method="POST" action="{{ route('complaint_post') }}" >
                  {{ csrf_field() }}                           
                  <textarea class="my-editor" cols="20" rows="10" name='content'></textarea><br>
                  <input type="hidden" value="RE : {!! $data_main['title'] !!}" name="title"></input>
                  <input type="hidden" value="{{$data_main['id']}}" name="complaint_id"></input>
                  <button type="submit" class="btn btn-primary">
                                   Kirim
                  </button>
                </form>
              </div>
              @endif
                                
            </div>
          <!-- End single archive post -->
          </div>
         <!-- start pagination -->
         
          <!-- End pagination -->
          
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12">
         <div class="blog_sidebar">
         <!-- Start single side bar -->
         <div class="single_sidebar">
            <h2>{{ __('front.other')}}</h2>
            <ul class="small_catg similar_nav">
                <li>
                  <div class="media">
                    <a href="#" class="media-left related-img">
                      <img alt="img" src="img/blog.jpg">
                    </a>
                    <div class="media-body">
                      <h4 class="media-heading"><a href="#">Karangwaru dalam Diskursus Madani</a></h4> 
                      <p>Karangwaru telah menjadi trade mark kelembagaan dalam skala nasional...</p>
                    </div>
                  </div>
                </li>                    
                <li>
                  <div class="media">
                    <a href="#" class="media-left related-img">
                      <img alt="img" src="img/blog.jpg">
                    </a>
                    <div class="media-body">
                      <h4 class="media-heading"><a href="#">Masyarakat Sanua Meraih Mimpi</a></h4> 
                      <p>Program Kota Tanpa Kumuh (KOTAKU) menitikberatkan bagaimana...</p>
                    </div>
                  </div>
                </li>
            </ul>
          </div>

        <!-- Start single side bar -->
         <div class="single_sidebar">
            <h2>{{ __('front.top')}}</h2>
            <ul class="small_catg similar_nav">
                <li>
                  <div class="media">
                    <a href="#" class="media-left related-img">
                      <img alt="img" src="img/blog.jpg">
                    </a>
                    <div class="media-body">
                      <h4 class="media-heading"><a href="#">Karang Timbang: Dari Permukiman Pakumis Jadi Permukiman Teratur</a></h4> 
                      <p>Dusun Karang Timbang adalah salah satu dari 14 dusun di Desa Montong Terep...</p>
                    </div>
                  </div>
                </li>                    
                <li>
                  <div class="media">
                    <a href="#" class="media-left related-img">
                      <img alt="img" src="img/blog.jpg">
                    </a>
                    <div class="media-body">
                      <h4 class="media-heading"><a href="#">Advokasi dan Sosialisasi Program KOTAKU di Nagari Silokek</a></h4> 
                      <p>Salah satu langkah awal membangun kolaborasi untuk memberikan pemahaman...</p>
                    </div>
                  </div>
                </li>
            </ul>
          </div>
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
         <!--  <div class="single_sidebar">
            <h2>Kategori</h2>
            <ul class="catg_nav">
              <li><a href="#">Business</a></li>
              <li><a href="#">Technology</a></li>
              <li><a href="#">News</a></li>
              <li><a href="#">Exclusive</a></li>
              <li><a href="#">Corporate</a></li>
            </ul>
          </div> -->
          <!-- Start single side bar -->
          <!-- <div class="single_sidebar">
            <h2>Tags</h2>
            <ul class="tags_nav">
              <li><a href="#">Corporate</a></li>
              <li><a href="#">Background</a></li>
              <li><a href="#">Recover</a></li>
              <li><a href="#">News</a></li>
              <li><a href="#">Template</a></li>
              <li><a href="#">Wordpress</a></li>
            </ul>
          </div> -->
          <!-- Start single side bar -->
          <div class="single_sidebar">
            <h2>{{ __('front.archive')}}</h2>
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
          <div class="single_sidebar">
            <h2>{{ __('front.link')}}</h2>
            <ul>
              <li><a href="#">Business</a></li>
              <li><a href="#">Technology</a></li>
              <li><a href="#">News</a></li>
              <li><a href="#">Exclusive</a></li>
              <li><a href="#">Corporate</a></li>
            </ul>
          </div>
         </div>
        </div>
      </div>
    </div>
  </section>
  @endsection

   @push('scripts')
<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
<script type="text/javascript">
  var editor_config = {
    path_absolute : "",
    selector: "textarea.my-editor",    
    menubar: false,
   plugins: [
    'advlist autolink lists link image charmap print preview anchor',
    'searchreplace visualblocks code fullscreen',
    'insertdatetime media table contextmenu paste code emoticons'
  ],
    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media | emoticons",
    relative_urls: false,  
  };
  tinymce.init(editor_config);

</script>

@endpush