@layout('templates.main')
@section('content') 
	<h1>Editing {{ $contact->name }}</h1>
	
	{{ render('error.contact_errors') }}
	
	{{ Form::open('contacts/update', 'PUT') }}
	
	<p>
		{{ Form::label('name', 'Naam') }}<br />
		{{ Form::text('name', $contact->name) }}
	</p>
	
	<p>
		{{ Form::label('email', 'Email') }}<br />
		{{ Form::email('email', $contact->email) }}
	</p>
	
	<p>
		{{ Form::label('telephone', 'Telefoon') }}<br />
		{{ Form::telephone('telephone', $contact->telephone) }}
	</p>
	
	<p>
		{{ Form::label('job_title', 'Functie') }}<br />
		{{ Form::text('job_title', $contact->job_title) }}
	</p>
	
	{{ Form::hidden('client_id', $contact->company_id) }}
	{{ Form::hidden('id', $contact->id) }}
	
	<p>{{ Form::submit('Wijzig contactpersoon') }}</p>

	{{ Form::close() }}
@endsection