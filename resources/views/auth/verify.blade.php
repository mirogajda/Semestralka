@extends('common.master')

@section('main')

    <div class="auth-card">
        <h3>Over svoju emailovú adresu</h3>

        @if (session('resent'))
            <div class="alert alert-success">
                {{ __('A fresh verification link has been sent to your email address.') }}
            </div>

        @endif

        <div class="footer">
            {{ __('Before proceeding, please check your email for a verification link.') }}
            {{ __('If you did not receive the email') }},
            <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                @csrf
                <button type="submit" class="btn btn-link">{{ __('click here to request another') }}</button>.
            </form>
        </div>

    </div>
@endsection
