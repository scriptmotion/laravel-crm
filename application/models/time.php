<?php
class Time extends Eloquent {

     public static $table = 'time';
     public static $timestamps = false;
     public static $rules = array(
     	'desc'	=> 'required',
     	'hour'	=> 'required',
     	'min'	=> 'required',
     	'type'	=> 'required'
     );
     
     public static function validate($data) {
		return Validator::make($data, static::$rules);
	}
     
     public function active( $id )
     {
	     return true;
     }

}