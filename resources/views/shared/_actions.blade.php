<?php 
	$edit = "edit_".$entity;
	$del = "delete_".$entity;
?>


@can($edit)  

    <a href='javascript:void(0);' id="{{ route($entity.'.edit', [str_singular($entity) => $id])  }}" class='edit_a' rel='tooltip-left' title="Edit {{$entity}}">
        <span class='fa fa-pencil-square-o' style='font-size:18px;'></span>
    </a>    
@endcan

@can($del)
    {!! Form::open( ['method' => 'delete', 'url' => route($entity.'.destroy', [$id]), 'style' => 'display: inline', 'id'=>'delete', 'class'=>'del_a' ,  'onSubmit' => 'return confirm("Are yous sure wanted to delete it?")']) !!}
       
        <a href='javascript:void(0)' class='del_a' rel='tooltip-left' title='Delete {{$entity}}'>
            <span class='glyphicon glyphicon-trash' style='font-size:18px;'></span>
        </a>
    {!! Form::close() !!}
@endcan