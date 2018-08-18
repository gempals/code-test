@extends('layouts.front') 
@section('title', 'Kotaku : Kota Tanpa Kumuh') 
@section('content')
  <!-- start banner area -->
  <section id="imgbanner">  
    <h2>Search</h2>     
  </section>
  <!-- End banner area -->
  

  <!-- start content editing  -->
  <section id="blogArchive">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-12">
         <div class="blogArchive_area">
         <!-- start page left side -->
          <div class="single_archiveblog">         
            <div class="archiveblog_right page_left">
              <h2>Search</h2>
              <form class="submitphoto_form" method="POST" action="{{ route('post_search') }}" >
                  {{ csrf_field() }}                            
                  <table>
                  <tr>   
                  <td>                  
                      <input type="text" class='form-control' name="key" style='width:500px;' value="{{$par['_key']}}"></input>
                  </td>
                  <td>
                    &nbsp;&nbsp;&nbsp;
                  </td>
                  <td>      
                  {!! Form::select('category_id',$category,null,['class'=>'form-control']) !!} 
                  </td>
                  <td>
                    &nbsp;&nbsp;&nbsp;
                  </td>
                  <td>

                  <button type="submit" class="btn btn-primary">
                      Search
                  </button>
                  </td> 
                  </tr>
                  </table>
              </form>              
              <ul>
              @if(!empty($data->all()))
              @foreach($data as $item)              
              <table width="100%" border=0 cellpadding="0" cellspacing="0">    
                <tr bgcolor="#ffffff">
                  <td class="pad5"> <h4><b><a class="bodyLink" target='_blank' href="{{route('detail',[$item->id,$item->slug])}}"> 
                    {{$item->title}}</a></b></h4></td> 
                </tr> 
                <tr>
                  <td>{{date('M j,Y',strtotime($item->created_at))}}</td> 
                </tr>
                <tr>
                  <td>{!! $item->summary !!}<br><br></td> 
                </tr>                
              </table>
              @endforeach

              </ul>
              {!! $data->render() !!}             
              </div>
               
               @else
               <h4>Data Tidak Ditemukan</h4>
               </ul>
              </div>
                @endif
              </div>
          <!-- End page left side -->
          </div>                      
        </div>
      </div>
    </div>
  </section>
  <!-- End content editing  -->
  @endsection