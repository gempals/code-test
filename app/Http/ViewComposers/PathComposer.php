<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
//use Illuminate\Http\Request;

class PathComposer{

	public $nav = [];

	public function __construct(){
		$this->nav = array('Menu'=>'Menu');
	}

	public function compose(View $view){
		
        //$data = array('path_admin'=>'');
        
	}

}

?>