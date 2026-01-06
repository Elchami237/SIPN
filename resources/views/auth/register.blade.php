<x-auth-layout title="Inscription">
    <div class="auth-header">
        <img src="{{ asset('images/logo-sipn.jpg') }}" alt="S.I.P.N." class="auth-logo" >
        <h1>Inscription</h1>
        <p>Créez votre compte administrateur</p>
    </div>

    <div class="auth-body">
        <!-- Validation Errors -->
        @if ($errors->any())
            <div class="error-message">
                <strong>Oups !</strong> Veuillez corriger les erreurs suivantes.
                <ul style="margin-top: 0.5rem; padding-left: 1.25rem;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('register') }}" class="auth-form">
            @csrf

            <!-- Name -->
            <div class="form-group">
                <label for="name">Nom complet</label>
                <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name" placeholder="Jean Dupont">
            </div>

            <!-- Email Address -->
            <div class="form-group">
                <label for="email">Adresse email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="username" placeholder="jean@example.com">
            </div>

            <!-- Password -->
            <div class="form-group">
                <label for="password">Mot de passe</label>
                <input id="password" type="password" name="password" required autocomplete="new-password" placeholder="••••••••">
                <small style="color: #6b7280; font-size: 0.85rem; display: block; margin-top: 0.25rem;">
                    Minimum 8 caractères
                </small>
            </div>

            <!-- Confirm Password -->
            <div class="form-group">
                <label for="password_confirmation">Confirmer le mot de passe</label>
                <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="••••••••">
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="form-group">
                    <label class="checkbox-label">
                        <input type="checkbox" name="terms" id="terms" required>
                        <span>
                            J'accepte les
                            <a href="{{ route('terms.show') }}" target="_blank" class="auth-link">Conditions d'utilisation</a>
                            et la
                            <a href="{{ route('policy.show') }}" target="_blank" class="auth-link">Politique de confidentialité</a>
                        </span>
                    </label>
                </div>
            @endif

            <!-- Actions -->
            <div class="form-group">
                <button type="submit" class="btn-primary">
                    Créer mon compte
                </button>
            </div>
        </form>
    </div>

    <div class="auth-footer">
        Vous avez déjà un compte ?
        <a href="{{ route('login') }}" class="auth-link">Se connecter</a>
    </div>
</x-auth-layout>
