@extends(config('restricted.views.layout'))

@section('content')
<form method="post" action="{{ route('restricted.exit') }}">
    @csrf
    <p>Enter your password to exit restricted mode.</p>

    <div class="form-group">
        <label for="password">{{ __('Password') }}</label>

        <div>
            <input id="password" type="password" placeholder="{{ __('Enter password') }}" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password" required autocomplete="off">

            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-group mb-0">
        <button type="submit" class="btn btn-lg btn-block btn-primary">
            {{ __('Exit Restricted Mode') }}
        </button>
    </div>
</form>
@endsection
