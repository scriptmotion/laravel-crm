@layout('templates.main')
@section('content') 
	<div class="well">
		<b>Naam:</b> {{ $client->name }}<br />
		<b>Email:</b> {{ $client->email }}<br />
		<b>Telefoon:</b> {{ $client->tel }}<br />
		<b>Adres:</b> {{ $client->address }}<br />
		<b>Postcode:</b> {{ $client->postal }}
	</div>
@endsection

