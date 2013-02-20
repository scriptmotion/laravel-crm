@layout('templates.main')
@section('content') 
	<h1>Editing {{ $traject->name }}</h1>
		
	{{ Form::open('trajects/update', 'PUT') }}
	<p>
		{{ Form::label('name', 'Naam') }}<br />
		{{ Form::text('name', $traject->name) }}
	</p>
	
	{{ Form::hidden('id', $traject->id) }}
	
	<p>{{ Form::submit('Wijzig traject') }}</p>

	{{ Form::close() }}
@endsection