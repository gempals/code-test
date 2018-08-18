@extends('layouts.admin')
@section('title', 'Create')
@section('content')
<div id="main" role="main">
    <div id="title-bar">
        <ul id="breadcrumbs">
            <li>
                <a href="dashboard.html" title="Home"><span id="bc-home"></span></a>
            </li>
            <li class="no-hover">Media</li>
        </ul>
    </div>
    <div class="shadow-bottom shadow-titlebar"></div>
    <div id="main-content">
        <div class="container_12">
            <div class="grid_12">
                <h1>Media</h1>
            </div>
            <div class="grid_6">
                <div class="block-border">
                    <div class="block-header">
                        <a href="{{ route('media.index') }}" class="btn btn-default btn-sm"> <i class="fa fa-arrow-left"></i> Back</a>
                    </div>
                    <div class="block-content  form">
                        <fieldset>
                            <legend>New</legend>
                                {!! Form::open(['route' => ['media.store'],'files'=>true,'class'=>'form-horizontal form-label-left']) !!}     
                                <div class="form-group @if ($errors->has('name')) has-error @endif">
                                    {!! Form::label('name', 'Type') !!}
                                    {!! Form::text('name', null, ['class' => 'form-control',  'style'=>'width:300px','placeholder' => 'Type']) !!}
                                    @if ($errors->has('name')) <p class="help-block">{{ $errors->first('name') }}</p> @endif
                                </div>
                                    <!-- Submit Form Button -->
                            	{!! Form::submit('Create', ['class' => 'btn btn-primary']) !!}
                                {!! Form::close() !!}
                        </fieldset>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

