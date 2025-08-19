<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Roulette</title>
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
</head>
<body>
    <div class="auth-container">
        <div class="auth-card">
            <div class="auth-header">
                <h2>Anmelden</h2>
                <p>Oder <a href="{{ route('register') }}">registriere dich hier</a></p>
            </div>
            
            @if ($errors->any())
                <ul class="error-message">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif

            <form class="auth-form" action="{{ route('login') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="email">E-Mail-Adresse</label>
                    <input id="email" name="email" type="email" required 
                           class="form-input" 
                           placeholder="E-Mail-Adresse" value="{{ old('email') }}">
                </div>
                
                <div class="form-group">
                    <label for="password">Passwort</label>
                    <input id="password" name="password" type="password" required 
                           class="form-input" 
                           placeholder="Passwort">
                </div>

                <button type="submit" class="auth-button">
                    Anmelden
                </button>
            </form>
            
            <div class="back-link">
                <a href="/">Zurück zur Startseite</a>
            </div>
        </div>
    </div>
</body>
</html>
