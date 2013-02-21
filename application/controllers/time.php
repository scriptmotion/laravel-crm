<?php
class Time_Controller extends Base_Controller {

	public $restful = true;

	public function get_start( $id )
	{	
		// Check if theres an active timer!!!
		Time::insert( array(
				'project'=>$id,
				'user'=>1,
				'start'=>time()
			));
		return Redirect::to_route('traject', $id)->with('message', 'Timer is gestart!');
	}
	
	public function get_stop( $id )
	{
		return View::make('home.time_stop')
			->with('title', 'Stop timer')
			->with('time', Time::find($id))
			->with('types', array('meeting'=>'Overleg','dev'=>'Ontwikkeling','admin'=>'Administratief','travel'=>'Reizen','service'=>'Service'));
	}
	
	public function get_delete( $id )
	{
		$timer = Time::find($id);
		//CHECK IF ITs THIS USER!
		
		Time::find($id)->delete();
		
		return Redirect::to_route('traject', $timer->project)->with('message', 'Timer is verwijderd!');
	}
	
	public function put_add()
	{
		$id = Input::get('id');
		$validation = Time::validate(Input::all());
		
		if($validation->fails()) {
			return Redirect::back()->with_errors($validation);
		} else {
			$timer = Time::find($id);
			
			$start 	= $timer -> start;
			$delta	= 0;
			
			$delta += round(Input::get('hour') * 3600);
			$delta += round(Input::get('min') * 60);
			
			$stop = $timer->start + $delta;

			Time::update($id, array(
				'stop'=>$stop,
				'delta'=>$delta,
				'comment'=>Input::get('desc'),
				'type'=>Input::get('type')
			));

			return Redirect::to_route('traject', $timer->project)->with('message', 'Timer is gestopt!');
		}
	}
	
	public function get_index()
	{
		return 'felse';
	}

}