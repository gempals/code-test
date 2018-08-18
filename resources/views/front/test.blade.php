@extends('layouts.test') 

@section('content') 
{!! Form::open(['route' => ['testi_post'],'files'=>true,'class'=>'form-horizontal form-label-left']) !!}                 
                  <div style="width: 400px;"></div>
                  <div class="form-group @if ($errors->has('author_name')) has-error @endif">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama</label>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                      {{ Form::text('author_name',null,array('class'=>'form-control'))}}
                      @if ($errors->has('author_name')) <p class="help-block">{{ $errors->first('author_name') }}</p> @endif
                    </div>
                  </div> <br> <br>              
                  <div class="form-group @if ($errors->has('content')) has-error @endif">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Testimoni</label>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                      {{ Form::textarea('content',null,array('class'=>'form-control my-editor'))}}
                      @if ($errors->has('content')) <p class="help-block">{{ $errors->first('content') }}</p> @endif
                    </div>
                  </div>
                  <div class="form-group @if ($errors->has('url')) has-error @endif">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Upload Photo</label>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                      {{ Form::file('img',null,array('class'=>'form-control'))}}
                      @if ($errors->has('img')) <p class="help-block">{{ $errors->first('img') }}</p> @endif
                    </div>
                  </div><br><br>
                  <div class="form-group @if ($errors->has('url')) has-error @endif">
                    <br><br><br><br>
                    <div class="col-md-9 col-sm-9 col-xs-12">


                                          {!! Recaptcha::render() !!}

                      @if ($errors->has('g-recaptcha-response')) <p class="help-block">{{ $errors->first('g-recaptcha-response') }}</p> @endif
                    </div>
                  </div>
                 

                  
                 <div class="form-group">
                    <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">           
                      <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                  </div>
                {{ Form::close()}} 
@endsection
