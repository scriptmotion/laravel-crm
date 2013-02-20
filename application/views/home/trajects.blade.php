@layout('templates.main')
@section('content') 
    <table class="table-striped table">
	  <caption>Trajecten management</caption>
	  <thead>
	    <tr>
	      <th>Naam</th>
	      <th>Klant</th>
	      <th>Opties</th>
	    </tr>
	  </thead>
	  <tbody>
	  	@foreach ($trajects as $t)
	  		<tr>
	  			<td> {{ HTML::link_to_route('traject', $t->name, array($t->id)) }} </td>
	  			<td> {{ HTML::link_to_route('clients', $t->cl_name, array($t->id)) }}  </td>
	  			<td> {{ HTML::link_to_route('edit_traject', 'Edit', array($t->id)) }} </td>
	  		</tr>
	  	@endforeach
	  </tbody>
	</table>
@endsection

