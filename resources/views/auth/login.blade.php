@extends('common.master')

@section('main')

    <div class="auth-card">
        <h3>Prihlásenie</h3>
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="form-group">
                <label>Email</label>
                <input type="email"
                       name="email"
                       required
                       autocomplete="email"
                       autofocus
                       class="@error('email') is-invalid @enderror">
                @error('email')
                <span class="error-message">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label>Heslo</label>
                <input type="password"
                       class="@error('password') is-invalid @enderror"
                       name="password"
                       required
                       autocomplete="current-password">
                @error('password')
                <span class="error-message">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="footer">
                <div>
                    <label class="fs-2">Zapamätaj si ma</label>
                    <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                </div>

                <button class="btn btn-primary w-100" type="submit">Prihlásiť</button>

                <div>
                    @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    @endif
                </div>
            </div>
        </form>
    </div>

@endsection
