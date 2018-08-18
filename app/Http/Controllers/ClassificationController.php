<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Classification;
use Illuminate\Support\Facades\DB;

class ClassificationController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function manageClassification()
    {
        $classifications = Classification::where('ClParentId', '=', 0)->get();
        //dd($classifications->childs);
        //dd($classifications);
        //$allClassifications = Classification::pluck('ClName','id','ClCode')->all();
       //dd($classifications);
//        return view('classificationTreeview',compact('classifications','allClassifications'));
       
        return view('classifications.index',compact('classifications'));
    }

      

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function addClassification(Request $request)
    {
        //dd($request->all());
        $this->validate($request, [
                'ClName' => 'required', 'ClCode' => 'required',
            ]);
//        $input = $request->all();

        $data = Classification::where('ClParentId',$request->ClParentId)->where('ClCode',$request->ClCode)->first();
        if(!empty($data)){
            flash()->warning('Duplicate Code !!!');
            return redirect()->route('classification.index');
        }
        //dd($data);
        $input['ClCode'] = $request->input('ClCode',null);
        $input['ClName'] = $request->input('ClName',null);
        $input['ClDesc'] = $request->input('ClDesc',null);
        $input['SusutId'] = $request->input('SusutId','');
        $input['ClParentId'] = $request->input('ClParentId',null);
        
        Classification::create($input);
        return back()->with('success', 'New Classification added successfully.');
    }

    public function updateClassification(Request $request)
    {     

        //dd($request->all());
        $input = $request->all();
        $update = Classification::where('id', $input['id'])->first(); 
        //dd($update);
        //dd($id);
        //dd($request->all());
        $update->ClName = $request->input('ClName',null);
        $update->ClDesc = $request->input('ClDesc',null);
        $update->save();
        //$update->update($request->all());

        flash()->success('Classification has been updated.');

        return redirect()->route('classification.index');
    }  

    public function deleteClassification(Request $request)
    {
        //
        $input = $request->all();
        $delete = Classification::where('id', $input['id'])->first(); 
         if($delete->delete()){
            flash()->success('Classification has been deleted');
            return redirect()->route('classification.index');
         }
         
    }

}