@extends('layouts.admin_dialog')

@section('title', 'Edit User ' . $user->first_name)

@section('styles')
<link href="{{asset('theme/admin/css/bootstrap-select.min.css')}}" rel="stylesheet">
@endsection

@section('content')

<div id="main" role="main">
   
    
    <div id="main-content">
        <div class="container_12">
            
            <div id="flash-msg">
                @include('flash::message')
            </div>
            <div class="grid_12">
                <div class="block-border">
                    <div class="block-header">
                    </div>
                    <div class="block-content  form">
                        {!! Form::model($user, ['method' => 'PUT', 'route' => ['users.update',  $user->id ] ]) !!}
                        <fieldset>
                            <legend>Edit</legend>
                            @include('user._form')
                            <!-- Submit Form Button -->
                        </fieldset>
                        <div class="block-actions">
                            
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

@push('scripts') 
 <script src="{{asset('theme/admin/js/jquery.min.js')}}"></script>
 <script src="{{asset('theme/admin/js/bootstrap.min.js')}}"></script>
 <script src="{{asset('theme/admin/js/bootstrap-select.min.js')}}"></script> 
 @endpush