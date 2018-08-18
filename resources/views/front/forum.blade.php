@extends('layouts.front') 
@section('title', 'Kotaku : Kota Tanpa Kumuh') 
@push('style')
    <link href='//cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css' rel='stylesheet' type='text/css'>     
@endpush
@section('content') 
<!-- start banner area -->
<section id="imgbanner">
<h2>Forum Mimbar Bebas</h2>
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
                        <h2>Forum</h2>
                         <div id="flash-msg">
                            @include('flash::message')
                        </div>                        
                        <a href="{{route('forum_topic')}}">
                            <button type="submit" class="btn btn-success" >Kirim Topic Forum</button>
                        </a>
                        <ul>
                            <table id="myTable" class="table table-striped">
                              <thead>
                                <tr>
                                  <tr>
                                    <th>Judul</th>
                                    <th>Pengirim</th>
                                    <th>Tanggapan</th>
                                    <th>Tanggal Kirim</th>                                    
                                </tr>
                                </tr>
                              </thead>
                              <tbody>
                                    @foreach($data as $item)
                                    <tr>
                                        <td><a href="{{ route('forum_detail',$item->id)}}" style="text-decoration: underline;">                                               
                                            {{$item->title}}</a></td>                                        
                                        <td>{{$item->user['name']}}</td>
                                        <td>{{$item->reply_count}}</td>
                                        <td>{{ $item->created_at->toFormattedDateString() }}</td>
                                    </tr>
                                    @endforeach
                              </tbody>
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