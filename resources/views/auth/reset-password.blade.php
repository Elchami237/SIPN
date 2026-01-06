<x-auth-layout title="Réinitialiser le mot de passe">
    <div class="auth-header">
        <img src="{{ asset('images/logo-sipn.jpg') }}" alt="S.I.P.N." class="auth-logo" style="filter: brightness(0) invert(1);">
        <h1>🔐 Nouveau mot de passe</h1>
        <p>Choisissez un nouveau mot de passe</p>
    </div>

    <div class="auth-body">
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

        <form method="POST" action="{{ route('password.update') }}" class="auth-form">
            @csrf

            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <!-- Email Address -->
            <div class="form-group">
                <label for="email">Adresse email</label>
                <input id="email" type="email" name="email" value="{{ old('email', $request->email) }}" required autofocus autocomplete="username" placeholder="votre@email.com">
            </div>

            <!-- Password -->
            <div class="form-group">
                <label for="password">Nouveau mot de passe</label>
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

            <!-- Actions -->
            <div class="form-group">
                <button type="submit" class="btn-primary">
                    Réinitialiser le mot de passe
                </button>
            </div>
        </form>
    </div>
</x-auth-layout>
