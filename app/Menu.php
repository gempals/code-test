<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    public function buildMenu($menu, $parentid = 0) 
	{ 
	  $result = null;
	  foreach ($menu as $item) 
	    if ($item->parent_id == $parentid) { 
	      $color = (empty($item->role)) ? "black" :"red";
	      $result .= "<li class='dd-item nested-list-item' data-order='{$item->order}' data-id='{$item->id}'>
	      <div class='dd-handle nested-list-handle'>
	        <span class='glyphicon glyphicon-move'></span>
	      </div>
	      <div class='nested-list-content'>
	      <span style='color:".$color."'>[ID] {$item->name_id}&nbsp;&nbsp;&nbsp;::&nbsp;&nbsp;[EN] {$item->name_en}</span>
	        <div class='pull-right'>
	          <a href='".url("cpanel_admin/menu/edit/{$item->id}")."'>Edit</a> |
	          <a href='#' class='delete_toggle' rel='{$item->id}'>Delete</a>
	        </div>
	      </div>".$this->buildMenu($menu, $item->id) . "</li>"; 
	    } 
	  return $result ?  "\n<ol class=\"dd-list\">\n$result</ol>\n" : null; 
	} 

	// Getter for the HTML menu builder
	public function getHTML($items)
	{
		return $this->buildMenu($items);
	}
}
