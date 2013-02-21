@if($errors->has())
	<ul>
		{{ $errors->first('desc', '<li>:message</li>') }}
		{{ $errors->first('hour', '<li>:message</li>') }}
		{{ $errors->first('min', '<li>:message</li>') }}
		{{ $errors->first('type', '<li>:message</li>') }}
	</ul>
@endif