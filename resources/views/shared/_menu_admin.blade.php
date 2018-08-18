<!-- menu -->

      <nav id="nav">
        <ul class="menu collapsible shadow-bottom">
          <li>
            <a href="{{route('dashboard.index')}}"><img src="{{asset('theme/admin/build/img/icons/packs/fugue/24x24/home.png')}}">Beranda<span class="badge"></span></a>
          </li>
      
      <li>
        <a href="javascript:void(0);"><img src="{{asset('theme/admin/build/img/icons/packs/fugue/24x24/document.png')}}">Berita<span class="badge grey"></span></a>
        <ul class="sub">         
         @can('view_news')
          <li>
            <a href="{{route('news.index')}}">Data Berita</a>
          </li>          
          @endcan          
        </ul>
      </li>  
     

      @can('view_roles','view_users')
      <li>
        <a href="javascript:void(0);"><img src="{{asset('theme/admin/build/img/icons/packs/fugue/24x24/keyboard.png')}}">Pengaturan<span class="badge grey"></span></a>
        <ul class="sub">
          @can('view_users')
          <li>
            <a href="{{route('users.index')}}">User</a>
          </li>
          @endcan
          @can('view_roles')
          <li>
            <a href="{{route('roles.index')}}">Role</a>
          </li>
          @endcan        
        </ul>
      </li>
      @endcan
      
        </ul>
      </nav>

<!-- end menu -->
