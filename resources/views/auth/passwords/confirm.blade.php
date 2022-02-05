@extends('common.master')

@section('main')

    <div class="auth-card">
        <h3>Potvrdenie hesla</h3>

        <div class="mb-2">Potvrď svoje heslo pred pokračovaním.</div>

        <form method="POST" action="{{ route('password.confirm') }}">
            @csrf

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

            <div class="form-group">
                <label>Zopakuj heslo</label>
                <input type="password"
                       class="@error('password') is-invalid @enderror"
                       name="password_confirmation"
                       required
                       autocomplete="new-password">
                @error('password')
                <span class="error-message">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="footer">
                <button type="submit" class="btn btn-primary">Potvrď heslo</button>

                @if (Route::has('password.request'))
                    <a class="btn btn-link" href="{{ route('password.request') }}">
                        Zabudol si voje heslo?
                    </a>
                @endif
            </div>
        </form>
    </div>
@endsection
