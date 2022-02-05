@extends('common.master')

@section('main')

    <div class="auth-card">
        <h3>Obnovenie hesla</h3>
        <div>
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('password.email') }}">
                @csrf

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

                <button class="btn btn-primary w-100" type="submit">Odošli link na email</button>
            </form>
        </div>
    </div>
@endsection
