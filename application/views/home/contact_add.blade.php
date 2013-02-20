@layout('templates.main')
@section('content') 
	<h1>Contact persoon toevoegen aan {{ $client->name }}</h1>
	
	{{ render('error.contact_errors') }}
	
	{{ Form::open('contacts/add') }}
	
	<p>
		{{ Form::label('name', 'Naam') }}<br />
		{{ Form::text('name') }}
	</p>
	
	<p>
		{{ Form::label('email', 'Email') }}<br />
		{{ Form::email('email') }}
	</p>
	
	<p>
		{{ Form::label('telephone', 'Telefoon') }}<br />
		{{ Form::telephone('telephone') }}
	</p>
	
	<p>
		{{ Form::label('job_title', 'Functie') }}<br />
		{{ Form::text('job_title') }}
	</p>
	
	{{ Form::hidden('client_id', $client->id) }}
	
	<p>{{ Form::submit('Contactpersoon toevoegen') }}</p>

	{{ Form::close() }}
@endsection