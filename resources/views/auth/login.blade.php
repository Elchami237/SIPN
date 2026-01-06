<x-auth-layout title="Connexion">
    <div class="auth-header">
        <img src="{{asset('images/logo-sipn.jpg')}}" alt="S.I.P.N." class="auth-logo" >
        <h1>Connexion</h1>
        <p>Accédez à votre espace d'administration</p>
    </div>

    <div class="auth-body">
        <!-- Session Status -->
        @if (session('status'))
            <div class="success-message">
                {{ session('status') }}
            </div>
        @endif

        <!-- Validation Errors -->
        @if ($errors->any())
            <div class="error-message">
                <strong>Oups !</strong> Il y a eu un problème.
                <ul style="margin-top: 0.5rem; padding-left: 1.25rem;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}" class="auth-form">
            @csrf

            <!-- Email Address -->
            <div class="form-group">
                <label for="email">Adresse email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username" placeholder="votre@email.com">
            </div>

            <!-- Password -->
            <div class="form-group">
                <label for="password">Mot de passe</label>
                <input id="password" type="password" name="password" required autocomplete="current-password" placeholder="••••••••">
            </div>

            <!-- Remember Me -->
            <div class="form-group">
                <label class="checkbox-label">
                    <input type="checkbox" name="remember">
                    <span>Se souvenir de moi</span>
                </label>
            </div>

            <!-- Actions -->
            <div class="form-group">
                <button type="submit" class="btn-primary">
                    Se connecter
                </button>
            </div>

            @if (Route::has('password.request'))
                <div style="text-align: center; margin-top: 1rem;">
                    <a href="{{ route('password.request') }}" class="auth-link">
                        Mot de passe oublié ?
                    </a>
                </div>
            @endif
        </form>
    </div>

    @if (Route::has('register'))
        <div class="auth-footer">
            Pas encore de compte ?
            <a href="{{ route('register') }}" class="auth-link">Créer un compte</a>
        </div>
    @endif
</x-auth-layout>
