<?php
namespace App\Http;

class Helpers {

    static function sizes($size){
      $base = log($size) / log(1024);
      $suffix = array("", " KB", " MB", " GB", " TB");
      $f_base = floor($base);
      return round(pow(1024, $base - floor($base)), 1) . $suffix[$f_base];
    }

    static function setDateFormat($format, $nilai="now", $output='dMY'){
		$en=array("Sun","Mon","Tue","Wed","Thu","Fri","Sat","Jan","Feb",
				  "Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec");
		$id=array("Minggu","Senin","Selasa","Rabu","Kamis","Jumat","Sabtu",
				  "Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September",
				  "Oktober","November","Desember");
		if($output!='dMY'){
			return date($output,strtotime($nilai));
		}else{ 
			return str_replace($en,$id,date($format,strtotime($nilai)));
		}
	}
}

?>


