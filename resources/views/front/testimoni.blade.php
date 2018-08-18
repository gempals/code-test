@extends('layouts.front') @section('title', 'Kotaku : Kota Tanpa Kumuh') @section('content') 
<!-- start banner area -->
<section id="imgbanner">
<h2>Testimonial</h2>
</section>
<!-- End banner area -->
<!-- start content editing  -->
<section id="blogArchive">
<div class="container">
  <div class="row">
   
    <div class="col-lg-8 col-md-8 col-sm-12">
      <div id="flash-msg">  
                @include('flash::message')
      </div>
      <div class="blogArchive_area">
        <!-- start page left side -->
        @foreach($data as $item)
        <div class="single_archiveblog wow fadeInDown">
          <div class="archiveblog_left">
            <?php
              $path = "content/upload/"; 
              $img = (!empty($item->img)) ? $path.$item->img : 'theme/front/img/human.png';
            ?>
            <img class="author_img" src="{{asset($img)}}" alt="img">
            <h5 class="author_name">{{$item->author_name}}</h5>
            <p class="postdate">{{$item->created_at->toFormattedDateString()}}</p>
          </div>
          <div class="archiveblog_right">            
             {!! $item->content !!}
          </div>
        </div>
        @endforeach
        {!! $data->render() !!}

        <div class="single_archiveblog">
          <div class="archiveblog_right page_left">
            <h2>Testimonial</h2>
            <ul>
              
              <table width="100%" border='0' cellpadding="0" cellspacing="0">
              <div id="register" class="animate form">
              {!! Form::open(['route' => ['testi_post'],'files'=>true,'class'=>'form-horizontal form-label-left']) !!}                 
                  <div style="width: 400px;"></div>
                  <div class="form-group @if ($errors->has('author_name')) has-error @endif">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama</label>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                      {{ Form::text('author_name',null,array('class'=>'form-control'))}}
                      @if ($errors->has('author_name')) <p class="help-block">{{ $errors->first('author_name') }}</p> @endif
                    </div>
                  </div> <br> <br>              
                  <div class="form-group @if ($errors->has('content')) has-error @endif">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Testimoni</label>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                      {{ Form::textarea('content',null,array('class'=>'form-control my-editor'))}}
                      @if ($errors->has('content')) <p class="help-block">{{ $errors->first('content') }}</p> @endif
                    </div>
                  </div>
                  <div class="form-group @if ($errors->has('url')) has-error @endif">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Upload Photo</label>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                      {{ Form::file('img',null,array('class'=>'form-control'))}}
                      @if ($errors->has('img')) <p class="help-block">{{ $errors->first('img') }}</p> @endif
                    </div>
                  </div><br><br>
                  <div class="form-group @if ($errors->has('url')) has-error @endif">
                    <br><br><br><br>
                    <div class="col-md-9 col-sm-9 col-xs-12">                                        

                      @if ($errors->has('g-recaptcha-response')) <p class="help-block">{{ $errors->first('g-recaptcha-response') }}</p> @endif
                    </div>
                  </div>                 
                 <div class="form-group">
                    <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">           
                      <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                  </div>
                {{ Form::close()}}     

              </div>
              </table>
            </ul>
          </div>
        </div>
        
        <!-- End page left side --></div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-12">
      <div class="blog_sidebar">
        <!-- Start single side bar pra kata tiap berita -->
        <div class="single_sidebar">
          <h2>Peraturan Testimonial</h2>
          <ul class="catg_nav">
             Testimonial ini dipergunakan untuk curah pendapat pelaksanaan KOTAKU. Tidak diperkenankan mengirimkan berita atau pesan atau tulisan yang berupa fitnah, hasutan, penghinaan, pelecehan, pornografi, narkoba, pendapat yang berbau SARA (Suku, Agama, Ras, dan Antargolongan), iklan (advertising) dan bernuansa politik apapun bentuknya. Pergunakan bahasa yang sopan dan berkaidah. Tim Website KOTAKU tidak bertanggungjawab atas isi atau kebenaran informasi di forum ini.<br>
            <br>
             Jika Anda berkeinginan untuk menuliskan pesan/tulisan yang bersifat <strong>&quot;pengaduan KOTAKU&quot;</strong> mohon gunakan fasilitas <strong><a class='textLink' href='pengaduan.asp?catid=1'>Pengaduan online</a></strong>.
          </ul>
          <h2></h2>
        </div>
        <!-- Start single side bar --></div>
    </div>
  </div>
</div>
</section>
<!-- End content editing  -->
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
    'insertdatetime media table contextmenu paste code'
  ],
  toolbar: 'undo redo |styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent |',
    relative_urls: false,
    
  };
  tinymce.init(editor_config); 
</script>

@endpush