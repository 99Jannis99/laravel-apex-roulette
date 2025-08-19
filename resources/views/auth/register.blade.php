<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrierung - Roulette</title>
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
</head>
<body>
    <div class="auth-container">
        <div class="auth-card">
            <div class="auth-header">
                <h2>Registrierung</h2>
                <p>Oder <a href="{{ route('login') }}">melde dich hier an</a></p>
            </div>
            
            @if ($errors->any())
                <ul class="error-message">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif

            <form class="auth-form" action="{{ route('register') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input id="name" name="name" type="text" required 
                           class="form-input" 
                           placeholder="Name" value="{{ old('name') }}">
                </div>
                
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
                
                <div class="form-group">
                    <label for="password_confirmation">Passwort bestätigen</label>
                    <input id="password_confirmation" name="password_confirmation" type="password" required 
                           class="form-input" 
                           placeholder="Passwort bestätigen">
                </div>

                <button type="submit" class="auth-button">
                    Registrieren
                </button>
            </form>
            
            <div class="back-link">
                <a href="/">Zurück zur Startseite</a>
            </div>
        </div>
    </div>
</body>
</html>
