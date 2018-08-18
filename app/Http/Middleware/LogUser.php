<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Route;
use App\Log_activity;

class LogUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    protected $activeLog;

    protected $logName;

    public function __construct(){

        $this->activeLog = config('app.active_user_log');

        $this->logName = ['files.store'=>'Upload File',
                          'files.detail_file'=>'View Detail File',
                          'files.update'=>'Update Files',
                          'files.destroy'=>'Delete Files',
                          'files.index'=>'Show List Files',
                          'files.edit'=>'Edit List Files',
                          'files.move_folder'=>'Move Files Folder',
                          'folders.index'=>'Show List Folder',
                          'folders.update'=>'Edit Folder',
                          'folders.destroy'=>'Delete Folder',
                          'folders.store'=>'Add New Folder',
                          'users.index'=>'Show List User',
                          'users.update'=>'Update User',
                          'users.destroy'=>'Delete User',
                          'users.store'=>'Add New User',
                          'divisions.index'=>'Show List Division',
                          'divisions.update'=>'Update Division',
                          'divisions.destroy'=>'Delete Division',
                          'divisions.store'=>'Add New Division',
                          'company.index'=>'Show List Company',
                          'company.update'=>'Update Company',
                          'company.destroy'=>'Delete Company',
                          'company.store'=>'Add New Company',
                          'location.index'=>'Show List Location',
                          'add.location'=>'Show List Location',
                          'update.location'=>'Update Location',
                          'delete.location'=>'Delete Location',
                          'classification.index'=>'Show List Clasification',
                          'add.classification'=>'Add New Clasification',
                          'update.classification'=>'Update Clasification',
                          'delete.classification'=>'Delete Clasification',
                          'titles.index'=>'Show List JobTitle',
                          'titles.update'=>'Update JobTitle',
                          'titles.destroy'=>'Delete JobTitle',
                          'titles.store'=>'Add New JobTitle',
                          ];
    }

    public function handle($request, Closure $next)
    {      

        $nextRequest = $next($request);
        $user = $request->user();
        $action_name = $request->route()->getName();

        if($this->activeLog && $user !== null){
            $this->_logUser($action_name,$user->id);
        }        
        return $nextRequest;
    }

     private function _logUser($action_name = null,$user = null){
                
        if(array_key_exists($action_name,$this->logName)){
            Log_activity::create(['user_id'=>$user,'log'=>$this->logName[$action_name]]);
        }
    }
}
