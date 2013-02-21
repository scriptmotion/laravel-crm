<?php

class Trajects_Controller extends Base_Controller {

	public $restful = true;

	public function get_index()
	{	
		return View::make('home.trajects')
			->with('title', 'Alle trajecten')
			->with('trajects', Trajects::left_join('clients',function($join){
    $join->on('trajects.client_id','=','clients.id');
})->order_by('clients.name','asc')->get(array('trajects.*','clients.name as cl_name')));	
	}
	
	public function get_view($id)
	{
		return View::make('home.traject')
			->with('title', 'Traject')
			->with('traject', Trajects::find($id))
			->with('clients', Clients::where('id', '=', $id)->get());
	}
	
	public function get_new()
	{
		return 'I am group id ';
	}
	
	public function action_edit()
	{
		return 'henk';
	}
	
	public function get_edit_traject($id)
	{
		return View::make('home.traject_edit')
			->with('title', 'Edit traject')
			->with('traject', Trajects::find($id));
	}
	
	public function get_add_contact($id)
	{
		return View::make('home.contact_add')
			->with('client', Clients::find($id));
	}
	
	public function post_contact()
	{
		$cid = Input::get('client_id');
		$validation = Contacts::validate(Input::all());
		
		if($validation->fails()) {
			return Redirect::to_route('add_contact', $cid)->with_errors($validation);
		} else {
			Contacts::insert( array(
				'company_id'=>$cid,
				'name'=>Input::get('name'),
				'email'=>Input::get('email'),
				'telephone'=>Input::get('telephone'),
				'job_title'=>Input::get('job_title')
			));
			
			return Redirect::to_route('client', $cid)->with('message', 'Contact persoon is toegevoegd!');
		}
	}
	
	public function get_confirm_delete($id)
	{
		return View::make('home.traject_confirm_delete')
			->with('title','Delete traject')
			->with('traject', Trajects::find($id));
	}
	
	public function get_edit($id)
	{
		return View::make('home.traject_edit')
			->with('title','Edit traject')
			->with('traject', Trajects::find($id));
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
	
	public function put_update_contact()
	{
		$id = Input::get('id');
		$cid = Input::get('client_id');
		$validation = Contacts::validate(Input::all());
		
		if($validation->fails()) {
			return Redirect::to_route('edit_contact', $id)->with_errors($validation);
		} else {
			Contacts::update($id, array(
				'name'=>Input::get('name'),
				'email'=>Input::get('email'),
				'telephone'=>Input::get('telephone'),
				'job_title'=>Input::get('job_title')
			));
			
			return Redirect::to_route('client', $cid)->with('message', 'Contact persoon is aangepast!');
		}
	}

}