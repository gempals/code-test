<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\News;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $data = News::latest()->get(); 
        return view('news.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('news.new');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $this->validate($request, [
            'title' => 'required',                                            
            'summary' => 'required',                                            
            'detail' => 'required',                                            
            'redactional' => 'required',                                            
            'publish_date' => 'required',                                            
                  
        ]);

        $data = new News;
        $data->title = $request->input('title','');
        $data->summary = $request->input('summary','');
        $data->detail = $request->input('detail','');
        $data->redactional = $request->input('redactional','');
        $data->publish_date = date('Y-m-d',strtotime($request->input('publish_date','')));

        if($data->save()){
             flash()->success('Berita Berhasil ditambahkan');
             return redirect()->route('news.index');  
        }else{
            flash()->warning('Gagal ditambahkan');
            return redirect()->route('news.index'); 
        }

        //dd($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {        

        $data = News::findOrFail($id);   
        return view('news.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = News::findOrFail($id);
        $post = $request->all();
        $post['publish_date'] = date('Y-m-d',strtotime($post['publish_date']));            
        $data->update($post);
        flash()->success('Berita Telah disimpan');
        return redirect()->route('news.edit',$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

        $data = News::findOrFail($id);
         if($data->delete()){
            flash()->success('Berita Telah dihapus');
            return redirect()->route('news.index');
        }
    }
}
