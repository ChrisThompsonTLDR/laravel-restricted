@extends(config('restricted.views.layout'))

@section('content')
<p>You are now in restricted mode.</p>

<a href="{{ route('restricted.exit') }}">Exit restricted mode</a>
@endsection
