<?php

namespace App\Http\Controllers;

use App\Menu;
use App\Category;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items  = Menu::orderBy('order')->get();
        $menu   = new Menu;
        $menu   = $menu->getHTML($items);
        $category = $this->_category();

        return view('menu.index', compact('items','menu','category'));
    }

    public function edit($id)
    {   
        $item = Menu::find($id);
        $category = $this->_category();
        //dd($item);
        return view('menu.edit', compact('item','category'));
        //$this->layout->content = View::make('admin.menu.edit', array('item'=>$item));
    }

    public function postNew(Request $request)
    {
        //var_dump($request->parent_id);
        $parent = 0;
        $item = new Menu;

        if(isset($request->page)){

            $post = Post::where('id',$request->page)->get();        
            if(count($post) > 0){
                $item->page = $request->input('page',''); 
            }else{
                flash()->success('Post Content Not Found');
                return redirect()->back(); 
            }
        }


        $item->name_id   = $request->name_id;
        $item->name_en   = $request->name_en;    
        $item->url_in    = $request->url_in; 
        $item->url_ext   = $request->input('url_ext','');
        $item->role      = $request->role;
        $item->parent_id = $request->input('parent_id',0);
        $item->order     = Menu::max('order')+1;       


        $item->save();

        return redirect()->action('MenuController@index');
    }

    public function postEdit($id, Request $request)
    {   
        $item = Menu::find($id);
        
      
        $item->name_id    = $request->name_id;
        $item->name_en    = $request->input('name_en','');    
        $item->url_in     = $request->input('url_in',''); 
        $item->url_ext    = $request->input('url_ext',''); 
        $item->page       = $request->input('page',''); 
        $item->role       = $request->role; 

        $item->save();

        return redirect()->action('MenuController@edit',['id'=>$id]);
        //return Redirect::to("admin/menu/edit/{$id}");
    }

    // AJAX Reordering function
    public function postIndex(Request $request)
    {   
        /*$source       = e(Input::get('source'));
        $destination  = e(Input::get('destination',0));*/

        $source       =  $request->source;
        $destination  =  $request->destination;

        $item             = Menu::find($source);
        $item->parent_id  = $destination;  
        $item->save();

        /*$ordering       = json_decode(Input::get('order'));
        $rootOrdering   = json_decode(Input::get('rootOrder'));*/

        $ordering       = json_decode($request->order);
        $rootOrdering   = json_decode($request->rootOrder);

        if($ordering){
          foreach($ordering as $order=>$item_id){
            if($itemToOrder = Menu::find($item_id)){
                $itemToOrder->order = $order;
                $itemToOrder->save();
            }
          }
        } else {
          foreach($rootOrdering as $order=>$item_id){
            if($itemToOrder = Menu::find($item_id)){
                $itemToOrder->order = $order;
                $itemToOrder->save();
            }
          }
        }

        return 'ok ';
    }

    public function postDelete(Request $request)
    {
        //$id = Input::get('delete_id');
        $id = $request->delete_id;
        // Find all items with the parent_id of this one and reset the parent_id to zero
        $items = Menu::where('parent_id', $id)->get()->each(function($item)
        {
            $item->parent_id = 0;  
            $item->save();  
        });

        // Find and delete the item that the user requested to be deleted
        $item = Menu::find($id);
        $item->delete();

        return redirect()->action('MenuController@index');
        //return Redirect::to('admin/menu');
    }

    private function _category(){
         $category = Category::orderBy('order')->get(); 
         $list = new Category;
         return $list->list($category);
    }
    
}
