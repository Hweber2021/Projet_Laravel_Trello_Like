@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <img src="/image/logo.png" alt="logo">
                    </a>
                </div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Un email de vérification à été envoyer sur votre boite mail.') }}
                        </div>
                    @endif

                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('Si vous n\'avez pas recu le mail') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('Nouveau lien de vérification') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
