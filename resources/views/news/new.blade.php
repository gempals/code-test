@extends('layouts.admin')
@section('title', 'Buat Berita')
@section('content')
<div id="main" role="main">
    <div id="title-bar">
        <ul id="breadcrumbs">
            <li>
                <a href="{{route('dashboard.index')}}" title="Home"><span id="bc-home"></span></a>
            </li>
            <li class="no-hover">Input Data Berita</li>
        </ul>
    </div>
    <div class="shadow-bottom shadow-titlebar"></div>
    <div id="main-content">
        <div class="container_12">
            <div class="grid_12">
                <h1>Input Data Berita</h1>
            </div>
           
            <div class="grid_8">
                <div class="block-border">
                    <div class="block-header">
                    </div>
                    <div class="block-content  form">
                        {!! Form::open(['route' => ['news.store'],'files'=>true,'class'=>'form-horizontal form-label-left']) !!}     
                        <fieldset>
                            <legend>Buat Baru</legend>
                                <div class="form-group @if ($errors->has('title')) has-error @endif">
                                    {!! Form::label('Judul') !!}
                                    {!! Form::text('title', null, ['class' => 'form-control','placeholder' => 'Judul']) !!}
                                    @if ($errors->has('title')) <p class="help-block">{{ $errors->first('title') }}</p> @endif
                                </div>
                                <div class="form-group @if ($errors->has('summary')) has-error @endif">
                                    {!! Form::label('Ringkasan') !!}
                                    {!! Form::textarea('summary', null, ['class' => 'form-control input_tiny']) !!}
                                    @if ($errors->has('summary')) <p class="help-block">{{ $errors->first('summary') }}</p> @endif
                                </div>
                                <div class="form-group @if ($errors->has('detail')) has-error @endif">
                                    {!! Form::label('detail') !!}
                                    {!! Form::textarea('detail', null, ['class' => 'form-control input_tiny']) !!}
                                    @if ($errors->has('detail')) <p class="help-block">{{ $errors->first('detail') }}</p> @endif
                                </div> 
                                <div class="form-group @if ($errors->has('redactional')) has-error @endif">
                                    {!! Form::label('Redaksional') !!}
                                    {!! Form::textarea('redactional', null, ['class' => 'form-control input_tiny']) !!}
                                    @if ($errors->has('redactional')) <p class="help-block">{{ $errors->first('redactional') }}</p> @endif
                                </div>
                                <div class="form-group @if ($errors->has('publish_date')) has-error @endif">
                                    {!! Form::label('Tanggal Tanyang') !!}
                                    {!! Form::text('publish_date', null, ['class' => 'form-control pubdate','style'=>'width:200px;']) !!}
                                    @if ($errors->has('publish_date')) <p class="help-block">{{ $errors->first('publish_date') }}</p> @endif
                                </div>
                                    <!-- Submit Form Button -->
                        </fieldset>
                        <div class="block-actions">
                            <ul class="actions-left">
                                <a class="button red" href="{{ route('news.index') }}">Batal</a>
                            </ul>
                            <ul class="actions-right">
                                <li>
                                    {!! Form::submit('Simpan', ['class' => 'button btn-primary']) !!}
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
<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
<script type="text/javascript">
    
    tinymce.init({
    selector: '.input_tiny',
    theme: 'modern',
    width: 600,
    height: 300,
    plugins: [
      'advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker',
      'searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking',
      'save table contextmenu directionality emoticons template paste textcolor'
    ],
    content_css: 'css/content.css',
    toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons'
  });
  $('.pubdate').datepicker({ dateFormat: 'dd-mm-yy'});

</script>
@endpush

