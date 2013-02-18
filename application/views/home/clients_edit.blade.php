@layout('templates.main')
@section('content') 
	<h1>Editing {{ $client->name }}</h1>
	
	{{ render('error.client_errors') }}
	
	{{ Form::open('clients/update', 'PUT') }}
	<p>
		{{ Form::label('name', 'Naam') }}<br />
		{{ Form::text('name', $client->name) }}
	</p>
	
	{{ Form::hidden('id', $client->id) }}
	
	<p>{{ Form::submit('Wijzig klant') }}</p>

	{{ Form::close() }}
@endsection