@extends('layouts.admin')

@section('title', 'Edit User ' . $user['name'])

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
                <h1>Edit {{ $user['name'] }}</h1>
                <div id="flash-msg">
                    @include('flash::message')
                    @if($errors->has('password'))
                    <div class="alert alert-warning" role="alert" style="overflow: hidden;">            
                        {{ $errors->first('password') }}
                    </div>
                    @endif
                </div>
            </div>           
            <div class="grid_6">
                <div class="block-border">
                    <div class="block-header">
                    </div>
                    <div class="block-content  form">
                        {!! Form::open(['route' => ['dashboard.profile']]) !!}     
                       <fieldset>
                            <legend>Edit</legend>
                            <!-- Name Form Input -->
                            <div class="form-group @if ($errors->has('name')) has-error @endif">
                                {!! Form::label('name', 'Name') !!}
                                {{$user['name']}}                                
                            </div>

                            <!-- email Form Input -->
                            <div class="form-group">
                                {!! Form::label('email', 'Email') !!}
                                <p>{{$data->email}}</p>                                
                            </div>

                            <!-- password Form Input -->
                            <div class="form-group @if ($errors->has('password')) has-error @endif">
                                {!! Form::label('New Password') !!}
                                {!! Form::password('password', ['class' => 'form-control', 'style'=>'width:100px', 'placeholder' => 'Password']) !!}
                                @if ($errors->has('password')) <p class="help-block">{{ $errors->first('password') }}</p> @endif
                            </div>
                            <div class="form-group @if ($errors->has('password_confirmation')) has-error @endif">
                                {!! Form::label('Confirm New Password') !!}
                                {!! Form::password('password_confirmation', ['class' => 'form-control', 'style'=>'width:100px', 'placeholder' => 'Confirm Password']) !!}
                                @if ($errors->has('password_confirmation')) <p class="help-block">{{ $errors->first('password_confirmation') }}</p> @endif
                            </div>
                        </fieldset>
                        <div class="block-actions">
                            <ul class="actions-left">
                                @can('add_users')
                                <a class="button red" href="{{ route('dashboard.index') }}">Cancel</a>
                                @endcan
                            </ul>
                            <ul class="actions-right">
                                <li>
                                    {!! Form::submit('Save Change', ['class' => 'button btn-primary']) !!}
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