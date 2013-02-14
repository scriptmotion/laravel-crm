<?php
 
class Api_Todos_Controller extends Base_Controller {
 
    public $restful = true;
 
    public function get_index($id = null) 
    {
        if (is_null($id )) 
        {
            return json_encode(array('empty'=>'array is empty'));
        } 
        else
        {
            return json_encode(array('henk'=>'vet grappig'));
        }
    } 
    public function post_index() 
    {
 
    }
 
    public function put_index() 
    {
 
    }
 
    public function delete_index($id = null) 
    {
 
    } 
 
}
 
?>