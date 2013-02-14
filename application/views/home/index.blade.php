@layout('templates.main')
@section('content') 
    @foreach ($trajects as $post)
        <div class="span4">
            <h3>{{ $post->name }}</h3>
            <p>{{ $post->type }}</p>
            <span class="badge badge-success">Posted {{$post->deadline}}</span>
            <hr />
        </div>
    @endforeach
@endsection