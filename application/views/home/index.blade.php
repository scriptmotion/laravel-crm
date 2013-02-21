@layout('templates.main')
@section('content') 
	@if ( $timer )
		<?php $diff = Date::clean_diff($timer->start, time()); ?>
		<p>Timer actief bij {{ $timer->cl_name }}! - {{ $diff }} - {{ HTML::link_to_route('time_stop', 'Stop timer', array($timer->id)) }}</p>
	@else
		<p>Er zijn geen actieve timers #luie flikkers</p>
	@endif
    @foreach ($trajects as $post)
        <div class="span4">
            <h3>{{ $post->name }}</h3>
            <p>{{ $post->type }}</p>
            <span class="badge badge-success">Posted {{$post->deadline}}</span>
            <hr />
        </div>
    @endforeach
@endsection