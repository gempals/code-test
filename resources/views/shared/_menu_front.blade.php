<?php 
  $name = "name_".$lang;
?>
<ul class="nav navbar-nav navbar-right custom_nav">
  <!-- <li>
    <a href="{{route('front')}}" role="button" aria-expanded="false">{{ __('menu.home')}}</a>
  </li> -->
   @foreach ($menu as $item)
  <li class="dropdown">
   
     @if(isset($item['SubMenu'])) 
     <?php $link = (!empty($item['url_ext'])) ? $item['url_ext'] : "#" ?>
     <a href="{{url($link)}}" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{$item[$name]}}<span class="caret"></span></a>
      <ul class="dropdown-menu" role="menu">
         @foreach($item['SubMenu'] as $_item)
        <li>
          @if(!empty($_item['url_in']))
          <a href="{{route('cat',$_item['url_in'])}}">{{$_item[$name]}}</a>
          @elseif(!empty($_item['page']))
          <a href="{{route('pages',$_item['page'])}}">{{$_item[$name]}}</a> 
          @elseif(!empty($_item['url_ext']))
          <a href="{{url($_item['url_ext'])}}">{{$_item[$name]}}</a>          
          @else
          <a href="#">{{$_item[$name]}}</a>
          @endif
        </li>
         @endforeach
      </ul>
     @else <a href="#">{{$item[$name]}}</a>
    @endif
  </li>
   @endforeach @if (Auth::guest())


  <li class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ __('menu.member')}}<span class="caret"></span></a>
    <ul class="dropdown-menu" role="menu">
      <li>
        <a href="{{ route('login') }}">{{ __('menu.login')}}</a>
      </li>
      <li>
        <a href="{{ route('register') }}">{{ __('menu.regis')}}</a>
      </li>
    </ul>
  </li>
   @else

    @if(Auth::user()->hasRole('Internal'))    
    <li class="dropdown">
      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Data SIM<span class="caret"></span></a>
      <ul class="dropdown-menu" role="menu">
        <li>
          <a href="{{ route('under_cons') }}">Link Data SIM</a>
        </li>        
      </ul>
    </li>
    @endif
    @if(!Auth::user()->hasRole('User'))
    <li class="dropdown">
      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ __('menu.member')}}<span class="caret"></span></a>
      <ul class="dropdown-menu" role="menu">
        <li>
          <a href="{{ route('admin_home') }}">Administrator</a>
        </li>
        <li>
          <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="glyphicon glyphicon-log-out"></i> {{ __('menu.logout')}} </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>        
        </li>
      </ul>
    </li>
    @else
    <li class="dropdown">      
      <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="glyphicon glyphicon-log-out"></i> {{ __('menu.logout')}} </a>
      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
    </li>
    @endif
    

   @endif
</ul>