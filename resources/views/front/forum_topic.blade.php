@extends('layouts.front') 
@section('title', 'Kotaku : Kota Tanpa Kumuh') 
@push('style')
    <link href='//cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css' rel='stylesheet' type='text/css'>     
@endpush
@section('content') 
<!-- start banner area -->
<section id="imgbanner">
<h2>Kirim Topic Baru</h2>
</section>
<!-- End banner area -->
<!-- start content editing  -->
<section id="blogArchive">
<div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-12">
            <div class="blogArchive_area">
                <!-- start page left side -->
                <div class="single_archiveblog">
                    <div class="archiveblog_right page_left">
                        <h2>Kirim Topic</h2>
                        <div id="flash-msg">
                            @include('flash::message')
                        </div>
                         <div class="contact_left wow fadeInLeft">
                          <h4>Topic Forum</h4>
                          {!! Form::open(['route' => ['forum_topic_store'],'class'=>'form-horizontal form-label-left']) !!}                                
                            <div class="form-group @if ($errors->has('title')) has-error @endif">
                              <div class="col-md-9 col-sm-9 col-xs-12">
                                {{ Form::text('title',null,array('class'=>'form-control my-editor','placeholder'=>'Judul Pengaduan'))}}
                                @if ($errors->has('title')) <p class="help-block">{{ $errors->first('title') }}</p> @endif
                              </div>
                            </div>
                            <div class="form-group @if ($errors->has('content')) has-error @endif">
                              <div class="col-md-9 col-sm-9 col-xs-12">
                                {{ Form::textarea('content',null,array('class'=>'form-control my-editor','placeholder'=>'Isi Pengaduan'))}}
                                @if ($errors->has('content')) <p class="help-block">{{ $errors->first('content') }}</p> @endif
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="control-label col-md-1 col-sm-1 col-xs-12"> 
                                <button type="submit" class="btn btn-success" >Kirim</button>
                              </label>                    
                            </div>

                          {{ Form::close()}}     

                        </div> 
                    </div>
                </div>
                <!-- End page left side --></div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="blog_sidebar">
                <!-- Start single side bar pra kata tiap berita -->
                <div class="single_sidebar">
                    <h2>PERATURAN PENULISAN PESAN</h2>
                    <ul class="catg_nav">
                         Forum ini dipergunakan untuk curah pendapat pelaksanaan KOTAKU. Tidak diperkenankan mengirimkan berita atau pesan atau tulisan yang berupa fitnah, hasutan, penghinaan, pelecehan, pornografi, narkoba, pendapat yang berbau SARA (Suku, Agama, Ras, dan Antargolongan), iklan (advertising) dan bernuansa politik apapun bentuknya. Pergunakan bahasa yang sopan dan berkaidah. Tim Website KOTAKU tidak bertanggungjawab atas isi atau kebenaran informasi di forum ini.<br>
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
@endsection 

@push('scripts')
<script>
    $(document).ready(function(){
        $('#myTable').DataTable();
    });
</script>
 <script src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
@endpush
<!-- End content editing  -->