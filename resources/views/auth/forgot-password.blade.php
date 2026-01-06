<x-auth-layout title="Mot de passe oublié">
    <div class="auth-header">
        <img src="{{ asset('images/logo-sipn.jpg') }}" alt="S.I.P.N." class="auth-logo" style="filter: brightness(0) invert(1);">
        <h1>🔑 Mot de passe oublié</h1>
        <p>Réinitialisez votre mot de passe</p>
    </div>

    <div class="auth-body">
        <div class="info-message">
            Entrez votre adresse email et nous vous enverrons un lien pour réinitialiser votre mot de passe.
        </div>

        <!-- Session Status -->
        @if (session('status'))
            <div class="success-message">
                {{ session('status') }}
            </div>
        @endif

        <!-- Validation Errors -->
        @if ($errors->any())
            <div class="error-message">
                <strong>Erreur !</strong>
                <ul style="margin-top: 0.5rem; padding-left: 1.25rem;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('password.email') }}" class="auth-form">
            @csrf

            <!-- Email Address -->
            <div class="form-group">
                <label for="email">Adresse email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus placeholder="votre@email.com">
            </div>

            <!-- Actions -->
            <div class="form-group">
                <button type="submit" class="btn-primary">
                    Envoyer le lien de réinitialisation
                </button>
            </div>

            <div style="text-align: center; margin-top: 1rem;">
                <a href="{{ route('login') }}" class="auth-link">
                    ← Retour à la connexion
                </a>
            </div>
        </form>
    </div>
</x-auth-layout>
