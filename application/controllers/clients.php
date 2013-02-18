<?php

class Clients_Controller extends Base_Controller {

	public $restful = true;

	public function get_index()
	{
		return View::make('home.clients')
			->with('title', 'Alle klanten')
			->with('clients', Clients::all());
	}
	
	public function get_view()
	{
		return 'hi there!';
	}
	
	public function get_new()
	{
		return 'I am group id ';
	}
	
	public function action_edit()
	{
		return 'henk';
	}
	
	public function get_edit($id)
	{
		return View::make('home.clients_edit')
			->with('title','Edit client')
			->with('client', Clients::find($id));
	}
	
	public function put_update()
	{
		$id = Input::get('id');
		$validation = Clients::validate(Input::all());
		
		if($validation->fails()) {
			return Redirect::to_route('edit_client', $id)->with_errors($validation);
		} else {
			Clients::update($id, array(
				'name'=>Input::get('name')
			));
			
			return Redirect::to_route('clients', $id)->with('message', 'Client changed');
		}
	}

}