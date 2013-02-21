@layout('templates.main')
@section('content') 
    <table class="table-striped table">
	  <caption>Trajecten management</caption>
	  <thead>
	    <tr>
	      <th></th>
	      <th>Naam</th>
	      <th>Klant</th>
	      <th>Deadline</th>
	      <th>Type</th>
	      <th>Opties</th>
	    </tr>
	  </thead>
	  <tbody>
	  	@foreach ($trajects as $t)
	  		<tr>
	  			<td> <a href="{{ URL::to_route('time_start', array($t->id)) }}"><i class="icon-time"></i></a> </td>
	  			<td> {{ HTML::link_to_route('traject', $t->name, array($t->id)) }} </td>
	  			<td> {{ HTML::link_to_route('client', $t->cl_name, array($t->client_id)) }}  </td>
	  			<td> 
	  			@if ( $t->deadline != 0 ) 
	  				{{ Date::forge($t->deadline)->format('%d %B, %Y'); }} 
	  			@endif
	  			</td>
	  			<td> {{ $t->type }} </td>
	  			<td> <a href="{{ URL::to_route('edit_traject', array($t->id)) }}"><i class="icon-edit"></i></a> <a href="{{ URL::to_route('confirm_delete_traject', array($t->id)) }}"><i class="icon-trash"></i></a> </td>
	  		</tr>
	  	@endforeach
	  </tbody>
	</table>
@endsection