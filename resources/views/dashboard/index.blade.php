@extends('layouts.admin')


@section('content')
<style type="text/css">
.block-content {
    background: none repeat scroll 0 0 #fafafa;
    border-radius: 3px 3px 3px 3px;
    position: relative;
    padding: 0 10px;
    min-height: 150px;
    border: 1px solid #4b5e6b
}


</style>
<div id="main" role="main">
    <div id="title-bar">
        <ul id="breadcrumbs">
            <li>
                <a href="{{route('dashboard.index')}}" title="Home"><span id="bc-home"></span></a>
            </li>
            <li class="no-hover">Beranda</li>
        </ul>
    </div>
    <div class="shadow-bottom shadow-titlebar"></div>
    <div id="main-content">
        <div class="container_12">
            <div class="grid_12">                
                
                <h1>Selamat Datang</h1>
                <p>Knowledge Management</p>
                <!--div class="alert info">
                    <span class="hide">x</span><strong>Welcome {{$user->name}}</strong>
                </div>-->
            </div>
            <div id="flash-msg">
                @include('flash::message')
            </div>
            <div class="grid_12">
                
                <div class="block-border">
                    
                    <div class="block-content">
                        
                        <ul class="shortcut-list">                 
                            <li>
                                <a href="{{route('dashboard.profile_index')}}">
                                    <img src="{{asset('theme/admin/img/user.png')}}" width='60' height='65'> </a> <br>
                                    <p style='text-align:center;'>Profil</p>
                            </li>                            
                        </ul>

                        <div class="clear"></div>                        
                    </div>

                </div>



            </div>
          
           
            <div class="clear height-fix"></div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
 <!-- Datatables --
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
    <script src="{{asset('theme/admin/vendors/pdfmake/build/vfs_fonts.js')}}"></script> -->
@endpush

