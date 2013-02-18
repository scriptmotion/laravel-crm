@layout('templates.main')
@section('content') 
    <table class="table-striped table">
	  <caption>Klanten management</caption>
	  <thead>
	    <tr>
	      <th>Naam</th>
	      <th>Opties</th>
	    </tr>
	  </thead>
	  <tbody>
	  	@foreach ($clients as $cl)
	  		<tr>
	  			<td>{{ $cl -> name }}</td>
	  			<td> {{ HTML::link_to_route('edit_client', 'Edit', array($cl->id)) }}</td>
	  		</tr>
	  	@endforeach
	  </tbody>
	</table>
@endsection

