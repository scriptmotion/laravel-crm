<?php
class Trajects extends Eloquent {

     public static $table = 'trajects';
     
     
     public function client()
	{
	    return $this->belongs_to('Clients','client_id')->order_by('name', 'asc');
	}

}