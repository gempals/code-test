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
            <li class="no-hover">Users</li>
        </ul>
    </div>
    <div class="shadow-bottom shadow-titlebar"></div>
    <div id="main-content">
        <div class="container_12">
            <div class="grid_12">
                <h1>Users</h1>
            </div>
            <div id="flash-msg">
                @include('flash::message')
            </div>
            <div class="grid_12">
                <div class="block-border">
                    <div class="block-header">
                        <ul class="actions-left">
                            @can('add_users')
                            <a class="button" href="{{ route('users.create') }}">Create New</a>
                            @endcan
                        </ul>
                    </div>
                    <div class="block-content">
                        <table class="table" id="table-example">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Nama</th>                
                                    <th>Email</th>                
                                    <th>Aktif</th>                
                                    <th>Terverifikasi</th>                
                                    <th>Role</th>               
                                                  
                                    <th>Last Login</th>                
                                    <th>Last Logout</th>                
                                    <th>Create At</th>                
                                    @can('edit_users', 'delete_users')
                                        <th class="text-center">Actions</th>
                                    @endcan
                                </tr>
                            </thead>
                              <tbody>
                                 @foreach($result as $item)
                                    <?php $division = (!empty($item->subfields)) ? $item->subfields->ClName : "";?>
                                    <?php $jabatan = (!empty($item->organize)) ? $item->organize->ClName : "";?>
                                    <?php

                                    $Login = (!empty($item->last_login)) ? date('Y-m-d H:i:s',strtotime($item->last_login)) : "";
                                    $Logout = (!empty($item->last_logout)) ? date('Y-m-d H:i:s',strtotime($item->last_logout)) : "";
                                     
                                    ?>
                                   <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td><?php echo ($item->active == 1) ? "<span class='glyphicon glyphicon-ok'> Yes</span>" : "<span class='glyphicon glyphicon-remove'> No</span>" ?></td>
                                        <td><?php echo ($item->verified == 1) ? "<span class='glyphicon glyphicon-ok'> Yes</span>" : "<span class='glyphicon glyphicon-remove'> No</span>" ?></td>
                                        <td>{{ $item->roles->implode('name', ', ') }}</td>
                                       
                                        <td>{{ $Login }}</td>
                                        <td>{{ $Logout }}</td>
                                        <td>{{ $item->created_at->toFormattedDateString() }}</td>

                                        @can('edit_users')
                                        <td class="text-center">
                                            @include('shared._actions', [
                                                'entity' => 'users',
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
                    title: "Edit User",
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

