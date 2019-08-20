@extends('layouts.login')

@section('content')
    <div class="mdl-grid mdl-grid--no-spacing" style="height:100vh;">
        <div class="mdl-cell mdl-cell--6-col mdl-color--primary"></div>
        <div class="mdl-cell mdl-cell--6-col" style="display:flex;justify-content:center;align-items:center;">
            <div class="mdl-card mdl-shadow--2dp" style="width:75%;padding:25px;">
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="row">
                        <div class="col-6">
                            <div class="mdl-textfield mdl-js-textfield">
                                <input id="email" type="email" class="mdl-textfield__input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                <label for="email" class="mdl-textfield__label">{{ __('E-Mail Address') }}</label>
                                @error('email')
                                <span class="mdl-textfield__error" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mdl-textfield mdl-js-textfield">
                                <input id="password" type="password" class="mdl-textfield__input @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                <label for="password" class="mdl-textfield__label">{{ __('Password') }}</label>
                                @error('password')
                                <span class="mdl-textfield__error" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-6 offset-md-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-8 offset-md-4">
                            <button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored">
                                {{ __('Login') }}
                            </button>

                            @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
