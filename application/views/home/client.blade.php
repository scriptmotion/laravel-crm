@layout('templates.main')
@section('content') 
	<div class="well">
		<b>Naam:</b> {{ $client->name }}<br />
		<b>Email:</b> {{ $client->email }}<br />
		<b>Telefoon:</b> {{ $client->tel }}<br />
		<b>Adres:</b> {{ $client->address }}<br />
		<b>Postcode:</b> {{ $client->postal }}
	</div>
	
	<div class="well">
		@if($contacts)
		@foreach ($contacts as $c)
			<b>Naam:</b> {{ $c->name }}<br />
			<b>Email:</b> {{ $c->email }}<br />
			<b>Telefoon:</b> {{ $c->telephone }}<br />
			<b>Functie:</b> {{ $c->job_title }}<br />
			<i>{{ HTML::link_to_route('edit_contact', 'Wijzig', array($c->id)) }}</i>
			<hr />
		@endforeach
		@else
			<p>Er zijn nog geen contacten</p>
			<i>{{ HTML::link_to_route('add_contact', 'Toevoegen', array($client->id)) }}</i>
		@endif
	</div>
@endsection

