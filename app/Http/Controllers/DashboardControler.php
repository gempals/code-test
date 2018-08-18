<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dashboard;

use App\User;
use Illuminate\Support\Facades\Auth;


class DashboardControler extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

   

    public function profile(Request $request){
        $user = Auth::user()->toArray();
        $data = User::where('id',$user['id'])->first();
        if($request->all()){
            $this->validate($request, [                
                'password' => 'required|alpha_dash|min:8|confirmed',              
            ],
            [
                'password.required' => 'Password Can Not Be Empty',
                'password.confirmed'            => 'Your password confirmation does not match',
                'password.min'            => 'Pasword Minimum 8 Character'
            ]);
            if($request->get('password')) {
                $data->password = bcrypt($request->get('password'));
                $data->save();
                flash()->success('User has been updated.');
                return redirect()->route('dashboard.profile_index');
            }
        }
        //dd($data);
        return view('dashboard.profile',compact('data','user'));

    }
   

    public function index(Request $request)
    {
        $user = $request->user();              
        return view('dashboard.index',compact('user'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
      
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$title)
    {
        //       
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
         
    }
}
