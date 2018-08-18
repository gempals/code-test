<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Location;
use Illuminate\Support\Facades\DB;

class LocationController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function manageLocation()
    {
        $locations = Location::where('ClParentId', '=', 0)->get();
        $allLocations = Location::pluck('ClName','id','ClCode')->all();
//dd($classifications);
//        return view('classificationTreeview',compact('classifications','allClassifications'));
        return view('locations.index',compact('locations','allLocations'));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function addLocation(Request $request)
    {
        //dd($request->all());
        $this->validate($request, [
                'ClName' => 'required', 'ClCode' => 'required',
            ]);
//        $input = $request->all();
        $data = Location::where('ClParentId',$request->ClParentId)->where('ClCode',$request->ClCode)->first();
        if(!empty($data)){
            flash()->warning('Duplicate Code !!!');
            return redirect()->route('location.index');
        }
        $input['ClCode'] = $request->input('ClCode',null);
        $input['ClName'] = $request->input('ClName',null);
        $input['ClDesc'] = $request->input('ClDesc',null);
        $input['SusutId'] = $request->input('SusutId','');
        $input['ClParentId'] = $request->input('ClParentId',null);
        
        Location::create($input);
        return back()->with('success', 'New Location added successfully.');
    }

    public function updateLocation(Request $request)
    {     

        //dd($request->all());
        $input = $request->all();
        $update = Location::where('id', $input['id'])->first(); 
        //dd($update);
        //dd($id);
        //dd($request->all());
        $update->ClName = $request->input('ClName',null);
        $update->ClDesc = $request->input('ClDesc',null);
        $update->save();
        //$update->update($request->all());

        flash()->success('Location has been updated.');

        return redirect()->route('location.index');
    }  

    public function deletelocation(Request $request)
    {
        //
        $input = $request->all();
        $delete = Location::where('id', $input['id'])->first(); 
         if($delete->delete()){
            flash()->success('Location has been deleted');
            return redirect()->route('location.index');
         }
         
    }

}