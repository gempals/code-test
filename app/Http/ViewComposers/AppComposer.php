<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App;
use App\Permission_file;



class AppComposer{

	var $req;
  var $usr;
   

	public function __construct(Request $request){
        $this->req = $request;
        $this->usr = \Auth::user();      

	}

	public function compose(View $view){
     	  $user = $this->usr; 
        $this->_fileLock();
        $jobTitle = $user->jobTitle['name'];
        $division = $user->division['name'];        
        $userName = $user->name;
        $userInfo = ['job'=>$jobTitle,'div'=>$division,'userName'=>$userName];
        
        $view->with('userInfo',$userInfo);
	}

    private function _fileLock(){
        $yesterday = date("Y-m-d",strtotime(date('Y-m-d').'- 1 days'));
       /* $data = Permission_file::whereRaw("DATE(due_date) = '".$yesterday."'")
                                 ->where('media_id',1)
                                 ->where('status',3)->update(['take_in'=>1]);*/
        //dd($now);
    }

   

}

?>