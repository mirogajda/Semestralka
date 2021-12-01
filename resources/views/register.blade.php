@extends("layouts.master")
@section("obsah")
    @if ($errors->any())
        <div>
            <h2>Form is filled wrong</h2>
            <ol class="">
                @foreach ($errors->all() as $error)
                    <li>
                        <p class="">{{ $error }}</p>
                    </li>
                @endforeach
            </ol>
        </div>
    @endif
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div class="register">
            <h5>Registrácia</h5>
            <p>Prosím, vyplňte následujúci formulár pre registráciu</p>
            <hr>
            <div>
                <label for="name"><b>Meno</b></label>

                <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus />
            </div>

            <!-- Email Address -->
            <div>
                <label for="email"><b>E-mail</b></label>

                <input id="email" type="email" name="email" value="{{ old('email') }}" required />
            </div>

            <!-- Password -->
            <div>
                <label for="password"> <b>Heslo </b></label>

                <input id="password" type="password" name="password" required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div>
                <label for="password_confirmation"><b>Potvrďte heslo </b></label>

                <input id="password_confirmation" type="password" name="password_confirmation" required />
            </div>

            <div class="container signin">
                <button class="registerbtn" type="submit">
                    Registrovať
                </button>

                <p>Už zaregistrovaný?</p><a href="{{ route('login') }}">
                    Prihlasiť sa
                </a></p>

            </div>
        </div>
    </form>



@endsection
