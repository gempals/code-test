 @if(empty($info))
 <a href="javascript:void(0)" class="backFile" rel="{{$parent}}" id="{{$parent}}"><button class="btn btn-primary">Kembali</button></a>
 @endif
 <table id="datatable" class="table table-striped table-bordered">
  <thead>
    <tr>
      <tr>
        <th>Nama File/Folder</th>
        <th>Type</th>                        
    </tr>
    </tr>
  </thead>
  <tbody>
    @foreach($_file as $item)
        <?php //$title = $item->PostDetail['0']['title']; ?>
        @foreach( $item as $key => $_item)
        <tr>
          <?php //dd($_item);?>
            @if($_item['type'] == 1)
            <td><span class="glyphicon glyphicon-folder-close"></span> <a href="javascript:void(0)" class="getFolder" rel="{{$_item['id']}}" id="{{$id}}" >{{$key}}</a></td>
            <td>Folder</td>
            @else
            <td><span class="glyphicon glyphicon-file"></span> <a href="{{route('download_file',$_item['file_id'])}}">{{$key}} <i>({{Helper::sizes($_item['_size'])}})</i></a></td>
            <td>{{strtoupper($_item['ext'])." File"}}</str_>
            @endif
           
        </tr>
        @endforeach
    @endforeach            
    
  </tbody>
</table>