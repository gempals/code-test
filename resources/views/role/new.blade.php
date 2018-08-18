@extends('layouts.admin')
@section('title', 'Create')
@section('content')
<div id="main" role="main">
    <div id="title-bar">
        <ul id="breadcrumbs">
            <li>
                <a href="{{route('dashboard.index')}}" title="Home"><span id="bc-home"></span></a>
            </li>
            <li class="no-hover">Role</li>
        </ul>
    </div>
    <div class="shadow-bottom shadow-titlebar"></div>
    <div id="main-content">
        <div class="container_12">
            <div class="grid_12">
                <h1>Role</h1>
            </div>
            <!--div class="alert success">
                <span class="hide">x</span><strong>Success</strong> Lorem ipsum dolor sit amet.
            </div>-->
            <div class="grid_6">
                <div class="block-border">
                    <div class="block-header">
                    </div>
                    <div class="block-content  form">
                        {!! Form::open(['route' => ['roles.store'],'files'=>true,'class'=>'form-horizontal form-label-left']) !!}     
                        <fieldset>
                            <legend>New</legend>
                                <div class="form-group @if ($errors->has('name')) has-error @endif">
                                        {!! Form::label('name', 'Name') !!}
                                        {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Role Name']) !!}
                                        @if ($errors->has('name')) <p class="help-block">{{ $errors->first('name') }}</p> @endif
                                </div>
                                    <!-- Submit Form Button -->
                        </fieldset>
                        <div class="block-actions">
                            <ul class="actions-left">
                                @can('add_videolinks')
                                <a class="button red" href="{{ route('roles.index') }}">Cancel</a>
                                @endcan
                            </ul>
                            <ul class="actions-right">
                                <li>
                                    {!! Form::submit('Create New', ['class' => 'button btn-primary']) !!}
                                </li>
                            </ul>
                        </div>
                        {{ Form::close()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

