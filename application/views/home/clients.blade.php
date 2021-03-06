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
	  			<td> {{ HTML::link_to_route('client', $cl->name, array($cl->id)) }} </td>
	  			<td> {{ HTML::link_to_route('edit_client', 'Edit', array($cl->id)) }} </td>
	  		</tr>
	  	@endforeach
	  </tbody>
	</table>
@endsection

