<?php
class Contacts extends Eloquent {

     public static $table = 'contacts';
     public static $timestamps = false;
     public static $rules = array(
     	'name'	=> 'required',
     	'email' => 'email'
     );
     
     public static function validate($data) {
		return Validator::make($data, static::$rules);
	}

}