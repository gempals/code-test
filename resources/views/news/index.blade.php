@extends('layouts.admin')

@section('styles')
<link href="{{asset('theme/admin/css/jqueryUi-1.12.1.css')}}" rel="stylesheet">
@endsection

@section('content')
<div id="main" role="main">
    <div id="title-bar">
        <ul id="breadcrumbs">
            <li>
                <a href="{{route('dashboard.index')}}" title="Home"><span id="bc-home"></span></a>
            </li>
            <li class="no-hover">Data Berita</li>
        </ul>
    </div>
    <div class="shadow-bottom shadow-titlebar"></div>
    <div id="main-content">
        <div class="container_12">
            <div class="grid_12">
                <h1>Data Berita</h1>
            </div>
            <div id="flash-msg">
                @include('flash::message')
            </div>
            <div class="grid_12">
                <div class="block-border">
                    <div class="block-header">
                        <ul class="actions-left">
                            @can('add_tags')
                            <a class="button" href="{{ route('news.create') }}">Buat Baru</a>
                            @endcan
                        </ul>
                    </div>
                    <div class="block-content">
                        <table class="table" id="table-example">
                            <thead>
                                <tr>
                                    <th>Judul</th>                
                                    <th>Ringkasan</th> 
                                    <th>Tanggal Tanyang</th>               
                                                    
                                    <th>Create At</th>                
                                    @can('edit_news', 'delete_news')
                                        <th class="text-center">Actions</th>
                                    @endcan
                                </tr>
                            </thead>
                              <tbody>
                                 @foreach($data as $item)
                                    
                                   <tr>
                                        <td>{{ $item->title }}</td>
                                        <td>{!! $item->summary !!}</td>                                     
                                        <td><?php echo date('d M Y',strtotime($item->publish_date));?></td>                                     
                                        <td><?php echo date('d M Y',strtotime($item->created_at));?></td>

                                        @can('edit_news')
                                        <td class="text-center" width="25%">
                                            @include('shared._actions', [
                                                'entity' => 'news',
                                                'id' => $item->id
                                            ])
                                        </td>
                                        @endcan
                                    </tr>
                                @endforeach            
                               
                              </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="clear height-fix"></div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="{{asset('theme/admin/js/jquery-1.12.4.js')}}"></script>
<script src="{{asset('theme/admin/vendors/datatables.net/js/datatable.js')}}"></script>
<script src="{{asset('theme/admin/js/jqueryUi-1.12.1.js')}}"></script>
<script type="text/javascript">
$(document).ready(function () {

    $('.table').DataTable({
        "dom":'<"top"lf<"clear">>rt<"block-actions"ip>',
        "pagingType":"full_numbers",
    });

    $('.table tbody').on( 'click', '.edit_a', function () {
            var url = $(this).attr('id');
            var dialog = $('<div></div>')
               .html('<iframe style="border: 0px; " src="'+url+'" width="100%" height="100%"></iframe>')
               .dialog({
                   /*autoOpen: false,*/
                    modal: true,
                    height: 600,
                    width: 800,
                    title: "Edit Berita",
                    resizable: false,
                    closeText : " ",
                    open: function (event, ui) {
                        $(this).css('overflow', 'hidden'); //this line does the actual hiding
                    }
                    
               });
            dialog.dialog();              
             
        });

        $('.table tbody').on( 'click', '.del_a', function () {
            $(this).submit();     
             
        });
});
</script>
@endpush

