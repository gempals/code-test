@extends('layouts.front') 
@section('title', 'Kotaku : Kota Tanpa Kumuh') 
@push('style')
    <link href='//cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css' rel='stylesheet' type='text/css'>     
@endpush
@section('content') 
<!-- start banner area -->
<section id="imgbanner">
<h2>SMS Pengaduan</h2>
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
                        <h2>Pengaduan SMS</h2>
                        <ul>
                            <table id="myTable" class="table table-striped">
                              <thead>
                                <tr>
                                  <tr>
                                    <th>Nomer</th>
                                    <th>Isi</th>
                                    <th>Tanggal Kirim</th>                                    
                                </tr>
                                </tr>
                              </thead>
                              <tbody>
                                    @foreach($data as $item)
                                    <tr>
                                        <td>{{$item->smstrmtelp}}</a></td>                                        
                                        <td>{{$item->smstrmisi}}</td>
                                        <td>{{date('D-m-Y',strtotime($item->smstrmtglt))}}</td>
                                    </tr>
                                    @endforeach
                              </tbody>
                          </table>
                        </ul>
                    </div>
                </div>
                <!-- End page left side --></div>
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