<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;
use App\Mail\Notification;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;


class MessageController extends Controller
{
    private $acces_level;

    public function __construct(){        
        $this->acces_level = [ '0'=>'Internel Subbidang',
                               '1'=>'Subbidang',
                               '2'=>'Bidang',
                               '3'=>'Publik'];
    }
	public function inbox(Request $request){
       $user = $request->user();
       $data = Message::where('to_user_id',$user->id)
                        ->with(['userFrom'=>function($query){
                            $query->with(['subfields']);
                        },'inboxTo'])->orderBy('id','desc')
                        ->get();
       //dd($data);
       return view('message.inbox',compact('data'));
    }

    public function inbox_view($id = null){        
        $usr = Auth::user();

        //$name = array(0);
        //dd(json_encode($name));
        //dd(json_decode($d));
        $data = Message::where('id',$id)
                        ->where('to_user_id',$usr->id)
                        ->with(['userFrom'=>function($query){
                                    $query->with(['subfields']);
                                },
                                'inboxTo'=>function($query){
                                    $query->with(['folder'=>function($query){
                                        $query->with(['subfields']);
                                    }]);
                                }])
                        ->first();                        
        if(empty($data)){
            flash()->warning('You Dont have Acces For this Messages');
            return redirect()->route('messages.inbox');
        }
        $data->read = 1;
        $data->save();
        $exdata = null;
        //dd($data);
        if($data->message_type == 1){
            $exdata = Message::where('id',$data->parent_id)->with(['permissionFile'])->first();
        }
        //dd($data);
        $level_acces = $this->acces_level[$data->inboxTo->level_acces];

        $level = ['1'=>'Level 1 (Internal Bidang)',
                  '2'=>'Level 2 (internal Bappeda/Subanppeko/kab)',
                  '3'=>'Level 3 (Data Publik)'];

        $permission_status = ['1'=>'Tolak/Koreksi/Revisi ','2'=>'Setuju'];

        $waka = ['SK','WK'];

        if(in_array($usr->organize->ClCode, $waka)){
            $permission_status = ['3'=>'Setuju','4'=>'Persetujuan Atasan'];
        }else if($usr->organize->ClCode == "KP"){
            $permission_status = ['5'=>'Setuju'];
        }


        return view('message.inbox_view',compact('data','exdata','level_acces','level','permission_status'));

    } 

    public function outbox(Request $request){
       $user = $request->user();
       $data = Message::where('from_user_id',$user->id)
                        ->with(['userFrom'=>function($query){
                            $query->with(['subfields']);
                        }, 'inboxTo'=>function($query){
                                    $query->with(['folder'=>function($query){
                                        $query->with(['subfields']);
                                    }]);
                                }])->orderBy('id','desc')
                        ->get();
       //dd($data);
       return view('message.outbox',compact('data'));

    }

    public function outbox_view(Request $request, $id = null){
        $user = $request->user();
        $data = Message::where('id',$id)
                        ->where('from_user_id',$user->id)
                        ->with(['userTo'=>function($query){
                                    $query->with(['subfields']);
                                },
                                'inboxTo'=>function($query){
                                    $query->with(['folder'=>function($query){
                                        $query->with(['subfields']);
                                    }]);
                                }])
                        ->first();
        //dd($data);
        if(empty($data)){
            flash()->warning('You Dont have Acces For this Messages');
            return redirect()->route('messages.inbox');
        }
        $ori_message = null;
        if(!empty($data->parent_id)) {
            $ori_message = Message::where('id',$data->parent_id)->first();
        }
        $exdata = null;
        if(!is_object($data->permissionFile)){
            $exdata = Message::where('id',$data->parent_id)->with(['permissionFile'])->first();
        }
        if($data->to_user_id == $user->id){
            $data->read = 1;
            $data->save();               
        }
        //dd($data);
        return view('message.outbox_view',compact('data','ori_message','exdata'));

    }  

}
