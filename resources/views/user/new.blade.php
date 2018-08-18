@extends('layouts.admin')

@section('title', 'Create')

@section('styles')
<link href="{{asset('theme/admin/css/bootstrap-select.min.css')}}" rel="stylesheet">
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
          
            <div class="grid_6">
                <div class="block-border">
                    <div class="block-header">
                    </div>
                    <div class="block-content  form">
                        {!! Form::open(['route' => ['users.store'] ]) !!}
                        <fieldset>
                            <legend>New</legend>
                                    @include('user._form')
                                    <!-- Submit Form Button -->
                        </fieldset>
                        <div class="block-actions">
                            <ul class="actions-left">
                                @can('add_users')
                                <a class="button red" href="{{ route('users.index') }}">Cancel</a>
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

 @push('scripts') 
 <script src="{{asset('theme/admin/js/jquery.min.js')}}"></script>
 <script src="{{asset('theme/admin/js/bootstrap.min.js')}}"></script>
 <script src="{{asset('theme/admin/js/bootstrap-select.min.js')}}"></script> 
 @endpush