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
        <div class="col-lg-12 col-md-12 col-sm-12">
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
            
                            
          </div>
          <!-- End single archive post -->
          </div>
         <!-- start pagination -->
         <!--div class="post_navigation">
           <a class="previous_nav wow fadeInLeft" href="#"><i class="fa fa-hand-o-left"></i>Sebelumnya</a>
           <a class="next_nav wow fadeInRight" href="#">Berikutnya <i class="fa fa-hand-o-right"></i></a>
         </div>-->
          <!-- End pagination -->
         
        </div>
        
      </div>
    </div>
  </section>
  @endsection
  @push('scripts')
 <!-- Datatables -->
    
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
