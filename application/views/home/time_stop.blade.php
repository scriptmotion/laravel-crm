@layout('templates.main')
@section('content') 
	<h1>Stopping timer</h1>
	
	<?php $diff = Date::clean_diff($time->start, time()); ?>
	<p>Timer gestopt op {{ $diff }}</p>
	
	{{ HTML::link_to_route('time_delete', 'Verwijder timer', array($time->id)) }}
	
	{{ render('error.time_errors') }}
		
	{{ Form::open('time/stop', 'PUT') }}
	
	<p>
		{{ Form::label('desc', 'Werkzaamheden') }}<br />
		{{ Form::text('desc', $time->name) }}
	</p>
	
	<p>
		{{ Form::label('hour', 'Uren') }}<br />
		{{ Form::select('hour', Date::get_hours(), Date::hour_from_time_diff($time->start,time())); }}
	</p>
	
	<p>
		{{ Form::label('min', 'Min') }}<br />
		{{ Form::select('min', Date::get_minutes(), Date::min_from_time_diff($time->start,time())); }}
	</p>
	
	<p>
		{{ Form::label('type', 'Type') }}<br />
		{{ Form::select('type', $types); }}
	</p>
	
	{{ Form::hidden('id', $time->id) }}
	
	<p>{{ Form::submit('Wijzigen') }}</p>

	{{ Form::close() }}
@endsection