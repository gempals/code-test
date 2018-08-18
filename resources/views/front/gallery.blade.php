@extends('layouts.front') 
@section('title', 'Kotaku : Kota Tanpa Kumuh') 
@push('style')
<style>
    
</style>
<link rel="stylesheet" href="{{asset('theme/front/css/colorbox.css')}}" />
@endpush
@section('content') 
<!-- start banner area -->
<section id="imgbanner">
<h2>Gallery</h2>
</section>
<!-- End banner area -->
<!-- start content editing  -->
<section id="blogArchive">
  <div class="container">
    <div class="row">
      <div align="center">
          <button class="btn btn-default filter-button" data-filter="all">All</button>
        @foreach($folder as $item)
          <button class="btn btn-default filter-button" data-filter="{{$item->name}}">{{$item->name}}</button>
        @endforeach
      </div>
      <br/>
        @foreach($gallery as $_item)
            <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter {{$_item->FileCategory['name']}}">
                <a class="group3" href='{{asset($path_gallery.$_item->name)}}' title="{{$_item->caption}}">
                <img src="{{asset($path_gallery.$_item->name)}}" class="img-responsive gallery_img1" alt="{{$_item->caption}}"></a>
            </div>
        @endforeach
        </div>
    </div>
</section>
<!-- End content editing  -->
@endsection
@push('scripts')
<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){

    $(".filter-button").click(function(){
        var value = $(this).attr('data-filter');
        
        if(value == "all")
        {
            //$('.filter').removeClass('hidden');
            $('.filter').show('1000');
        }
        else
        {
//            $('.filter[filter-item="'+value+'"]').removeClass('hidden');
//            $(".filter").not('.filter[filter-item="'+value+'"]').addClass('hidden');
            $(".filter").not('.'+value).hide('3000');
            $('.filter').filter('.'+value).show('3000');
            
        }
    });
    
    if ($(".filter-button").removeClass("active")) {
$(this).removeClass("active");
}
$(this).addClass("active");

});
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="{{asset('theme/front/js/jquery.colorbox.js')}}"></script>
<script>
    $(document).ready(function(){
        //Examples of how to assign the Colorbox event to elements
        $(".group1").colorbox({rel:'group1'});
        $(".group2").colorbox({rel:'group2', transition:"fade"});
        $(".group3").colorbox({rel:'group3', transition:"none", width:"75%", height:"75%"});
        $(".group4").colorbox({rel:'group4', slideshow:true});
        $(".ajax").colorbox();
        $(".youtube").colorbox({iframe:true, innerWidth:640, innerHeight:390});
        $(".vimeo").colorbox({iframe:true, innerWidth:500, innerHeight:409});
        $(".iframe").colorbox({iframe:true, width:"80%", height:"80%"});
        $(".inline").colorbox({inline:true, width:"50%"});
        $(".callbacks").colorbox({
            onOpen:function(){ alert('onOpen: colorbox is about to open'); },
            onLoad:function(){ alert('onLoad: colorbox has started to load the targeted content'); },
            onComplete:function(){ alert('onComplete: colorbox has displayed the loaded content'); },
            onCleanup:function(){ alert('onCleanup: colorbox has begun the close process'); },
            onClosed:function(){ alert('onClosed: colorbox has completely closed'); }
        });

        $('.non-retina').colorbox({rel:'group5', transition:'none'})
        $('.retina').colorbox({rel:'group5', transition:'none', retinaImage:true, retinaUrl:true});
        
        //Example of preserving a JavaScript event for inline calls.
        $("#click").click(function(){ 
            $('#click').css({"background-color":"#f00", "color":"#fff", "cursor":"inherit"}).text("Open this window again and this message will still be here.");
            return false;
        });
    });
</script>
@endpush