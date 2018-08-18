@extends('layouts.front') 
@section('title', 'Kotaku : Kota Tanpa Kumuh') 
@section('content') 
  <!-- start banner area -->
  <section id="imgbanner">  
    <h2>Registrasi</h2>     
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
              <h2>Change Password</h2>                
              <div id="flash-msg">
                @include('flash::message')
              </div>
              <ul>
              <table width="100%" border=0 cellpadding="0" cellspacing="0"> 
                <div id="register" class="animate form">
                  <form  class="form-horizontal" role="form" method="POST" action="{{ route('set_password') }}">
                    {{ csrf_field() }}
                      
                      <div class="form-group{{ $errors->has('current_password') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Current Password</label>

                            <div class="col-md-6">
                                <input id="name" type="password" class="form-control" name="current_password" required autofocus>

                                @if ($errors->has('current_password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('current_password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">New Password</label>

                            <div class="col-md-6">
                                <input id="email" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password_confirmation" required>
                               
                            </div>
                        </div>                         

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Reset
                                </button>
                            </div>
                        </div> 
                     
                     
                  </form>
                 </div>
              </table> 
              </ul>
              </div>
              </div>
          <!-- End page left side -->
          </div>                      
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12">
         <div class="blog_sidebar">
          <!-- Start single side bar pra kata tiap berita -->
          <div class="single_sidebar">
            <h2>Peraturan Registrasi</h2>
            <ul class="catg_nav">
                Register ini dipergunakan untuk curah pendapat pelaksanaan KOTAKU. Tidak diperkenankan mengirimkan berita atau pesan atau tulisan yang berupa fitnah, hasutan, penghinaan, pelecehan, pornografi, narkoba, pendapat yang berbau SARA (Suku, Agama, Ras, dan Antargolongan), iklan (advertising) dan bernuansa politik apapun bentuknya. Pergunakan bahasa yang sopan dan berkaidah. Tim Website KOTAKU tidak bertanggungjawab atas isi atau kebenaran informasi di forum ini.<br><br>Jika Anda berkeinginan untuk menuliskan pesan/tulisan yang bersifat <strong>&quot;pengaduan KOTAKU&quot;</strong> mohon gunakan fasilitas <strong><a class='textLink' href='pengaduan.asp?catid=1'>Pengaduan online</a></strong>.
            </ul>
            <h2></h2>
          </div>
          <!-- Start single side bar -->
         </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End content editing  -->
  @endsection
  