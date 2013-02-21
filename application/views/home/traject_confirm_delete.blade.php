@layout('templates.main')
@section('content') 
	<h1>Delete {{ $traject->name }}</h1>
		
	<p>Weet je zeker dat je {{ $traject->name }} wilt verwijderen?</p>
	
	<a href="/trajects/{{$traject->id}}/delete" data-method="delete">Yes</a>
	<a href="{{ URL::to_route('traject', array($traject->id)) }}">No</a>
	
@endsection