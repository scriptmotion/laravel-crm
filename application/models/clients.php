<?php
class Clients extends Eloquent {

     public static $table = 'clients';
     public static $per_page = 10;
     public static $timestamps = false;
     public static $rules = array(
     	'name'	=> 'required'
     );
     
     public static function validate($data) {
		return Validator::make($data, static::$rules);
	}

}