@extends("layouts.master")
@section("obsah")
    <div class="logContainer">
        <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->

            <div>
                <label for="email"> E-mail: </label>

                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus />
                @error('email')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror

            </div>

            <!-- Password -->
            <div>
                <label for="password"> Heslo: </label>

                <input id="password" type="password" name="password" required autocomplete="current-password" />
            </div>

            <!-- Remember Me -->
            <div>
                <label for="remember_me">
                    <input id=" remember_me" type="checkbox" name="remember">
                    <span>Zapamätaj si ma</span>
                </label>
            </div>

            <div class = "container signin">

                <button class =  "loginButton" >
                    Prihlásiť sa
                </button>
                <p>Ešte nie ste registrovaný?</p><a href="{{ route('register') }}">
                    Zaregistrujte sa
                </a></p>
            </div>


        </form>
    </div>



@endsection




