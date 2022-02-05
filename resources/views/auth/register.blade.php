@extends('common.master')

@section('main')
    <div class="auth-card">
        <h3>Registrácia</h3>
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="form-group">
                <label>Meno</label>
                <input type="text"
                       name="name"
                       class="form-control @error('name') is-invalid @enderror"
                       value="{{ old('name') }}"
                       required
                       autocomplete="name"
                       autofocus>
                @error('name')
                <span class="error-message">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label>Email</label>
                <input type="email"
                       name="email"
                       required
                       autocomplete="email"
                       autofocus
                       value="{{ old('email') }}"
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
                <button class="btn btn-primary w-100" type="submit">Registruj ma</button>
            </div>
        </form>
    </div>

@endsection
