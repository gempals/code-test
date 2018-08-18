@extends('layouts.front') 
@section('title', 'Kotaku : Kota Tanpa Kumuh') 
@section('content') 
 <!-- start Contact section -->
<section id="contact">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="client_title">
          <br><br><br><br><br><br><br><br><hr>
        </div>
        <div class="row">
          <div>
            <div class="contact_left wow fadeInLeft">
              <form  class="form-horizontal" role="form" method="POST" action="{{ route('login') }}">
                  <div width="50%" >
                    {{ csrf_field() }}
                    <h1><center>Login</center> </h1>
                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                      <label for="email" class="col-md-4 control-label"></label>
                      <div class="col-md-4">
                        <input id="email" type="email" class="form-control" name="email"  placeholder="Email" value="{{ old('email') }}" required>
                      @if ($errors->has('email'))
                          <span class="help-block">
                              <strong>{{ $errors->first('email') }}</strong>
                          </span>
                      @endif
                      </div>
                      <div class="input-group-btn">
                        <button id="remove" data-val="1" class="btn btn-default btn-md"><span class="glyphicon glyphicon-remove"></span></button>
                      </div>
                    </div>
                  </div>
                  <div>
                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                      <label for="password" class="col-md-4 control-label"></label>
                      <div class="col-md-4">
                        <input id="password" type="password" class="form-control" placeholder="Password" name="password" required>
                      @if ($errors->has('password'))
                          <span class="help-block">
                              <strong>{{ $errors->first('password') }}</strong>
                          </span>
                      @endif
                      </div>
                      <div class="input-group-btn">
                        <button class="btn btn-default btn-md" id="showhide" data-val='1'><span id='eye' class="glyphicon glyphicon-eye-open"></span></button>
                      </div>
                    </div> 
                  </div>                  
                  <div>  
                    <div class="form-group">
                      <div class="col-md-6 col-md-offset-4">
                        <button type="submit" class="btn btn-primary">
                          Login
                        </button>
                        <a href="{{route('password.request')}}">
                                  Forgot Password
                        </a>
                      </div>
                    </div>  
                  </div>                   
              </form>
            </div>                  
          </div>
        </div>
        <div class="client_title">
          <br><br><br><br><br>
        </div>
      </div>   
    </div>
  </div>
</section>
@endsection

@push('scripts')
<script>
      $(document).ready(function() 
      {
         $("#showhide").click(function() 
         {
            if ($(this).data('val') == "1") 
            {
               $("#password").prop('type','text');
               $("#eye").attr("class","glyphicon glyphicon-eye-close");
               $(this).data('val','0');
            }
            else
            {
               $("#password").prop('type', 'password');
               $("#eye").attr("class","glyphicon glyphicon-eye-open");
               $(this).data('val','1');
            }
         });
      });
      
$(document).ready(function()

      {
         $("#remove").click(function()
         {
           $("#email").val('');
         });
         
      });
</script>
@endpush  <!-- End Contact section -->