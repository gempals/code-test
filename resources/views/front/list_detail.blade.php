@extends('layouts.front') 
@section('title', 'Kotaku : Kota Tanpa Kumuh')
@push('meta')
<meta name="description" content="{!! $data->PostDetail['0']['summary'] !!}">
<link rel="canonical" href="{{url()->current()}}">
<meta property="og:locale" content="id">
<meta property="og:type" content="article">
<meta property="og:title" content="{{$data->PostDetail['0']['title']}}">
<meta property="og:description" content="{!! $data->PostDetail['0']['summary'] !!}">
<meta property="og:url" content="{{url()->current()}}">
<meta property="og:site_name" content="Kotaku">
<meta name="twitter:card" content="summary">
<meta name="twitter:description" content="{!! str_limit($data->PostDetail['0']['summary'],100) !!}">
<meta name="twitter:title" content="{{$data->PostDetail['0']['title']}}">
<meta name="twitter:site" content="@kotaku">
<meta name="twitter:creator" content="@kotaku">
<link rel="dns-prefetch" href="//demo.kotaku.ga">
<link rel="dns-prefetch" href="//s.w.org">
@endpush 
@section('content') 
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
          <div class="single_archiveblog">
            

            <div class="archiveblog_center">
              <h2>{{$data->PostDetail['0']['title']}}</h2>
              <div class="post_commentbox">
                <a href="#"><i class="fa fa-tags"></i>Technology</a>
                <a href="#"><i class="fa fa-comments"></i>Comments</a>             
              </div>
              {!! $data->PostDetail['0']['content'] !!}              
            </div>
            @if(!empty($_file))
            <div class="archiveblog_center file">
               <table id="datatable" class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <tr>
                        <th>Nama File/Folder</th>
                        <th>Type</th>                        
                    </tr>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($_file as $item)
                        <?php //$title = $item->PostDetail['0']['title']; ?>
                        @foreach( $item as $key => $_item)
                        <tr>
                          <?php //dd($_item);?>
                            @if($_item['type'] == 1)
                            <td><span class="glyphicon glyphicon-folder-close"></span> <a href="javascript:void(0)" class="getFolder" rel="{{$_item['id']}}" id="{{$data->file_categories_id}}" >{{$key}}</a></td>
                            <td>Folder</td>
                            @else
                            <td><span class="glyphicon glyphicon-file"></span> <a href="{{route('download_file',$_item['file_id'])}}">{{$key}} <i>({{Helper::sizes($_item['_size'])}})</i></a></td>
                            <td>{{strtoupper($_item['ext'])." File"}}</str_>
                            @endif
                           
                        </tr>
                        @endforeach
                    @endforeach            
                    
                  </tbody>
                </table>
            </div>
            @endif

            <?php $img = "/content/upload/".$data->featured_img; ?>
            <div class="social_link">
              <ul class="sociallink_nav">
                <li>
                  <a target="_blank" href="https://www.facebook.com/sharer.php?s=100&p[url]={{url()->current()}}&p[images][0]={{url($img)}}&p[title]={{$data->PostDetail['0']['title']}}&p[summary]={{$data->PostDetail['0']['summary']}}"><i class="fa fa-facebook"></i></a>
                </li>
                <li>
                  <a target="_blank" href="https://twitter.com/intent/tweet?url={{url()->current()}}&text={{$data->PostDetail['0']['title']}}"><i class="fa fa-twitter"></i></a>
                </li>
                <li>
                  <a target="_blank" href="https://plus.google.com/share?url={{url()->current()}}"><i class="fa fa-google-plus"></i></a>
                </li>                
              </ul>
            </div>
            <div class="sociallink_nav">
              @if(!empty($data->sender_photo))
              <img class="author_img" src="{{asset('content/upload/'.$data->sender_photo)}}" alt="img">
              @else
              <img class="author_img" src="{{asset('theme/front/img/human.png')}}" alt="img">
              @endif
              <h5 class="author_name">{{$data->province['name'].",".$data->sender_name}}</h5>
              <p class="postdate">{{Helper::setDateFormat("D, j M Y",$data->created_at)}}</p>
            </div>
            
            <!-- komentar -->
            <div class="contact_left wow fadeInLeft">
              <h4>{{$data->comment_count}} Komentar</h4>
              <div class="post_commentbox">
                  <ol>
                    @foreach($data->Comment as $item)
                     <hr>
                     <li>
                          <div>
                              <div>
                                  Posted by <a href="#">{{$item->author}}</a> <span>|</span> {{$item->created_at->toFormattedDateString()}}<span>
                              </div>
                              {!! $item->content !!}
                          </div>
                         
                     </li>
                     @endforeach
                     
                                                   
                  </ol>
              </div>                        
            </div>

            @if(Auth::user())
            <div class="contact_left wow fadeInLeft">
              <h4>Komentar</h4>
              {!! Form::open(['route' => ['comment'],'class'=>'form-horizontal form-label-left']) !!}                 
                <div class="form-group @if ($errors->has('author')) has-error @endif">
                  <div class="col-md-9 col-sm-9 col-xs-12">
                    {{ Form::text('author',null,array('class'=>'form-control my-editor','placeholder'=>'Nama Anda'))}}
                    @if ($errors->has('author')) <p class="help-block">{{ $errors->first('author') }}</p> @endif
                  </div>
                </div>
                <div class="form-group @if ($errors->has('author_email')) has-error @endif">
                  <div class="col-md-9 col-sm-9 col-xs-12">
                    {{ Form::text('author_email',null,array('class'=>'form-control my-editor','placeholder'=>'Email'))}}
                    {{ Form::hidden('post_id',$data->id)}}
                    @if ($errors->has('author_email')) <p class="help-block">{{ $errors->first('author_email') }}</p> @endif
                  </div>
                </div>
                <div class="form-group @if ($errors->has('content')) has-error @endif">
                  <div class="col-md-9 col-sm-9 col-xs-12">
                    {{ Form::textarea('content',null,array('class'=>'form-control my-editor','placeholder'=>'Komentar'))}}
                    @if ($errors->has('content')) <p class="help-block">{{ $errors->first('content') }}</p> @endif
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-1 col-sm-1 col-xs-12"> 
                    <button type="submit" class="btn btn-success" >Submit</button>
                  </label>                    
                </div>

              {{ Form::close()}}     

            </div>
            @endif                  
          </div>
         
          <!-- End single archive post -->
          </div>
         <!-- start pagination -->
         <!--div class="post_navigation">
           <a class="previous_nav wow fadeInLeft" href="#"><i class="fa fa-hand-o-left"></i>Sebelumnya</a>
           <a class="next_nav wow fadeInRight" href="#">Berikutnya <i class="fa fa-hand-o-right"></i></a>
         </div>-->
          <!-- End pagination -->
          <div class="similar_post">
            <h2>Yang terkait <i class="fa fa-thumbs-o-up"></i></h2>
            <ul class="small_catg similar_nav wow fadeInDown">
                @foreach($other_data as $item)
               
                <li>
                  <div class="media wow fadeInDown">
                    <a href="#" class="media-left related-img">
                      @if(!empty($item->featured_img))
                      <img class="author_img" src="{{asset('content/upload/'.$item->featured_img)}}" alt="img">
                      @else
                      <img class="author_img" src="{{asset('theme/front/img/f_default.png')}}" alt="img" style="border:dashed 2px #BEBBBA;">
                      @endif
                    </a>
                    <div class="media-body">
                      <h4 class="media-heading"><a href="{{route('detail',[$item->id,$item->PostDetail['0']['slug']])}}">{{$item->PostDetail['0']['title']}}</a></h4> 
                      <p>{!! str_limit($item->PostDetail['0']['summary'],100) !!}</p>
                    </div>
                  </div>
                </li>                        
                @endforeach           
            </ul>
          </div>
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
         
         </div>
        </div>
      </div>
    </div>
  </section>
  @endsection
  @push('scripts')
 <!-- Datatables -->
    <script type="text/javascript">
    
    $(document).on("click", '.getFolder', function(event) { 
        var id = $(this).attr('rel');
        var _id = $(this).attr('id');
        $('.file').load("{{$url}}/"+id+"/"+_id)
    });
   /* $('.backFile').on('click', function(){
      alert('jasjdasd');
    });*/
    $(document).on("click", '.backFile', function(event) { 
      var id = $(this).attr('rel');
      var _id = $(this).attr('id');
      //alert(id);
      $('.file').load("{{$url}}/"+id+"/"+_id+"/back")
    });

    </script>
    <script src="{{asset('theme/admin/vendors/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('theme/admin/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
    <script src="{{asset('theme/admin/vendors/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('theme/admin/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js')}}"></script>
    <script src="{{asset('theme/admin/vendors/datatables.net-buttons/js/buttons.flash.min.js')}}"></script>
    <script src="{{asset('theme/admin/vendors/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
    <script src="{{asset('theme/admin/vendors/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
    <script src="{{asset('theme/admin/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js')}}"></script>
    <script src="{{asset('theme/admin/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js')}}"></script>
    <script src="{{asset('theme/admin/vendors/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('theme/admin/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js')}}"></script>
    <script src="{{asset('theme/admin/vendors/datatables.net-scroller/js/dataTables.scroller.min.js')}}"></script>
    <script src="{{asset('theme/admin/vendors/jszip/dist/jszip.min.js')}}"></script>
    <script src="{{asset('theme/admin/vendors/pdfmake/build/pdfmake.min.js')}}"></script>
    <script src="{{asset('theme/admin/vendors/pdfmake/build/vfs_fonts.js')}}"></script>
@endpush
