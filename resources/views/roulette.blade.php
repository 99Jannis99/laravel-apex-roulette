<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apex Legends Roulette</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/roulette.css') }}">
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
</head>
<body>
    <!-- Navigation Header -->
    <nav class="nav-header">
        <div class="nav-container">
            <div class="nav-brand">🎯 Apex Legends Roulette</div>
            
            <div class="nav-user">
                @auth
                    <div class="user-info">
                        @if(Auth::user()->profile_image)
                            <img src="{{ Storage::url(Auth::user()->profile_image) }}" 
                                 alt="Profilbild" 
                                 class="user-avatar">
                        @else
                            <div class="user-avatar-placeholder">
                                {{ substr(Auth::user()->name, 0, 1) }}
                            </div>
                        @endif
                        <span class="user-name">{{ Auth::user()->name }}</span>
                    </div>
                    
                    <form action="{{ route('logout') }}" method="POST" class="inline">
                        @csrf
                        <button type="submit" class="nav-button danger">
                            Abmelden
                        </button>
                    </form>
                @else
                    <div class="nav-buttons">
                        <a href="{{ route('login') }}" class="nav-button primary">
                            Anmelden
                        </a>
                        <a href="{{ route('register') }}" class="nav-button success">
                            Registrieren
                        </a>
                    </div>
                @endauth
            </div>
        </div>
    </nav>

    <!-- Success Message -->
    @if(session('success'))
        <div class="success-message">
            {{ session('success') }}
        </div>
    @endif

    <div class="container">
        <div class="header">
            <h1>🎯 Apex Legends Roulette</h1>
            <p>Klicke auf den Button und lass das Schicksal entscheiden!</p>
        </div>

        <div class="roulette-container">
            <div class="roulette-section">
                <h2>🎭 Charakter</h2>
                <div id="character-result">
                    <div class="placeholder">Klicke auf "SPIN" um zu starten</div>
                </div>
            </div>

            <div class="roulette-section">
                <h2>🔫 Waffe 1</h2>
                <div class="weapon-filters">
                    <h3>Wähle Waffenklassen:</h3>
                    <div class="filter-options">
                        <label><input type="checkbox" name="weapon1_classes" value="assault rifle" checked> Assault Rifle</label>
                        <label><input type="checkbox" name="weapon1_classes" value="smg" checked> SMG</label>
                        <label><input type="checkbox" name="weapon1_classes" value="sniper" checked> Sniper</label>
                        <label><input type="checkbox" name="weapon1_classes" value="shotgun" checked> Shotgun</label>
                        <label><input type="checkbox" name="weapon1_classes" value="lmg" checked> LMG</label>
                        <label><input type="checkbox" name="weapon1_classes" value="pistol" checked> Pistol</label>
                    </div>
                </div>
                <div id="weapon1-result">
                    <div class="placeholder">Klicke auf "SPIN" um zu starten</div>
                </div>
            </div>

            <div class="roulette-section">
                <h2>🔫 Waffe 2</h2>
                <div class="weapon-filters">
                    <h3>Wähle Waffenklassen:</h3>
                    <div class="filter-options">
                        <label><input type="checkbox" name="weapon2_classes" value="assault rifle" checked> Assault Rifle</label>
                        <label><input type="checkbox" name="weapon2_classes" value="smg" checked> SMG</label>
                        <label><input type="checkbox" name="weapon2_classes" value="sniper" checked> Sniper</label>
                        <label><input type="checkbox" name="weapon2_classes" value="shotgun" checked> Shotgun</label>
                        <label><input type="checkbox" name="weapon2_classes" value="lmg" checked> LMG</label>
                        <label><input type="checkbox" name="weapon2_classes" value="pistol" checked> Pistol</label>
                    </div>
                </div>
                <div id="weapon2-result">
                    <div class="placeholder">Klicke auf "SPIN" um zu starten</div>
                </div>
            </div>
        </div>

        <div style="text-align: center;">
            <button id="spin-button" class="spin-button">🎲 SPIN</button>
        </div>

        <div id="loading" class="loading">
            <div class="spinner"></div>
            <p>Roulette läuft...</p>
        </div>
    </div>

    <script src="{{ asset('js/roulette.js') }}"></script>
</body>
</html>
