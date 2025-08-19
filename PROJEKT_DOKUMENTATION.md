# Apex Legends Roulette - Projekt Dokumentation

## 📋 Projektübersicht

Das **Apex Legends Roulette** ist eine Webanwendung, die es Spielern ermöglicht, zufällige Charaktere und Waffen für das Spiel Apex Legends zu generieren. Die Anwendung bietet eine interaktive Roulette-Funktionalität mit Filtermöglichkeiten für verschiedene Waffenklassen.

## 🏗️ Architektur

Das Projekt folgt der **MVC (Model-View-Controller)** Architektur von Laravel und ist in zwei Hauptbereiche unterteilt:

### Backend (Laravel)
- **Framework**: Laravel 12.x
- **Datenbank**: SQLite (Standard)
- **API**: RESTful API-Endpunkte
- **Architektur**: MVC-Pattern

### Frontend
- **HTML**: Blade Templates
- **CSS**: Vanilla CSS mit modernen Design-Patterns
- **JavaScript**: Vanilla JavaScript (ES6+)
- **Responsive Design**: Mobile-first Ansatz

---

## 🔧 Backend (Laravel)

### 1. Models (Datenmodelle)

#### Character Model (`app/Models/Character.php`)
**Zweck**: Repräsentiert Charaktere aus Apex Legends

**Attribute**:
- `id` - Primärschlüssel
- `name` - Name des Charakters
- `image_url` - URL zum Charakterbild
- `description` - Beschreibung des Charakters
- `type` - Charaktertyp (assault, support, recon, defensive)
- `timestamps` - Erstellungs- und Aktualisierungszeitpunkt

**Methoden**:
- `getRandom()` - Gibt einen zufälligen Charakter zurück

**Verwendung**: Wird für die Roulette-Funktionalität und Charakterverwaltung verwendet.

#### Weapon Model (`app/Models/Weapon.php`)
**Zweck**: Repräsentiert Waffen aus Apex Legends

**Attribute**:
- `id` - Primärschlüssel
- `name` - Name der Waffe
- `image_url` - URL zum Waffenbild
- `type` - Waffentyp (assault rifle, smg, sniper, shotgun, lmg, pistol)
- `ammo_type` - Munitionstyp (light, heavy, energy, shotgun, sniper)
- `timestamps` - Erstellungs- und Aktualisierungszeitpunkt

**Verwendung**: Wird für die Roulette-Funktionalität und Waffenverwaltung verwendet. Alle Waffenabfragen erfolgen direkt über Eloquent im Controller.

### 2. Controllers

#### RouletteController (`app/Http/Controllers/RouletteController.php`)
**Zweck**: Hauptcontroller für alle Roulette-bezogenen Funktionen

**Methoden**:

1. **`index()`**
   - **Zweck**: Zeigt die Hauptseite der Roulette an
   - **Rückgabe**: Blade-View `roulette.blade.php`
   - **Verwendung**: Wird aufgerufen, wenn ein Benutzer die Startseite besucht

2. **`spinFiltered(Request $request)`**
   - **Zweck**: Generiert einen zufälligen Charakter und zwei Waffen basierend auf ausgewählten Waffenklassen
   - **Parameter**: 
     - `weapon1_classes[]` - Array der Waffenklassen für Waffe 1
     - `weapon2_classes[]` - Array der Waffenklassen für Waffe 2
   - **Rückgabe**: JSON-Response mit Charakter und gefilterten Waffen
   - **Verwendung**: Hauptfunktion der Roulette - wird beim Klicken des SPIN-Buttons aufgerufen



### 3. Datenbank

#### Migrationen

**Characters Tabelle** (`database/migrations/2025_08_18_132230_create_characters_table.php`)
```sql
CREATE TABLE characters (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    image_url VARCHAR(255) NOT NULL,
    description TEXT NULL,
    type VARCHAR(255) DEFAULT 'assault',
    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL
);
```

**Weapons Tabelle** (`database/migrations/2025_08_18_132237_create_weapons_table.php`)
```sql
CREATE TABLE weapons (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    image_url VARCHAR(255) NOT NULL,
    type VARCHAR(255) NOT NULL,
    ammo_type VARCHAR(255) NOT NULL,
    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL
);
```

#### Seeder

**CharacterSeeder** (`database/seeders/CharacterSeeder.php`)
- **Zweck**: Befüllt die Characters-Tabelle mit 25 vordefinierten Apex Legends Charakteren
- **Charaktertypen**: 
  - **Assault**: Wraith, Mirage, Octane, Revenant, Horizon, Fuse, Ash, Mad Maggie, Ballistic
  - **Support**: Lifeline, Loba, Conduit
  - **Recon**: Bloodhound, Pathfinder, Crypto, Valkyrie, Seer, Vantage
  - **Defensive**: Gibraltar, Caustic, Wattson, Rampart, Newcastle, Catalyst

**WeaponSeeder** (`database/seeders/WeaponSeeder.php`)
- **Zweck**: Befüllt die Weapons-Tabelle mit 30 vordefinierten Apex Legends Waffen
- **Waffentypen**:
  - **Assault Rifles**: R-301 Carbine, Flatline, Hemlok Burst AR, Havoc Rifle, Nemesis Burst AR
  - **SMGs**: R-99 SMG, Prowler Burst PDW, Alternator SMG, Volt SMG, C.A.R. SMG
  - **Snipers**: Longbow DMR, Kraber .50-Cal Sniper, Sentinel, Charge Rifle
  - **Shotguns**: EVA-8 Auto, Mastiff Shotgun, Peacekeeper, Mozambique
  - **LMGs**: Spitfire, L-STAR EMG, Devotion LMG, Rampage LMG
  - **Pistols**: Wingman, P2020, RE-45 Auto

**Munitionstypen**:
- **Light**: Leichte Munition (grün)
- **Heavy**: Schwere Munition (blau)
- **Energy**: Energiemunition (gelb)
- **Shotgun**: Schrotflintenmunition (rot)
- **Sniper**: Scharfschützenmunition (lila)

### 4. Routing

**Web-Routen** (`routes/web.php`)
```php
// Hauptseite
Route::get('/', [RouletteController::class, 'index']);

// API-Routen (ohne CSRF-Schutz)
Route::middleware(['web'])->prefix('api')->group(function () {
    Route::get('/spin', [RouletteController::class, 'spin']);
    Route::get('/spin-filtered', [RouletteController::class, 'spinFiltered']);
    Route::get('/characters', [RouletteController::class, 'getCharacters']);
    Route::get('/weapons', [RouletteController::class, 'getWeapons']);
});
```

**Routenübersicht**:
- **`/`** → Zeigt die Roulette-Hauptseite
- **`/api/spin-filtered`** → Generiert gefilterte Ergebnisse (Hauptfunktion)

---

## 🎨 Frontend

### 1. Blade Template

**Hauptseite** (`resources/views/roulette.blade.php`)
**Zweck**: HTML-Struktur der Roulette-Anwendung

**Struktur**:
1. **Header-Bereich**
   - Titel: "🎯 Apex Legends Roulette"
   - Beschreibung: "Klicke auf den Button und lass das Schicksal entscheiden!"

2. **Roulette-Container**
   - **Charakter-Sektion**: Zeigt den ausgewählten Charakter
   - **Waffe 1-Sektion**: Zeigt die erste Waffe mit Filteroptionen
   - **Waffe 2-Sektion**: Zeigt die zweite Waffe mit Filteroptionen

3. **Filter-System**
   - Checkboxen für verschiedene Waffenklassen
   - Jede Waffe hat eigene Filteroptionen
   - Unterstützt mehrere Waffenklassen pro Waffe

4. **Spin-Button**
   - Zentrierter Button mit "🎲 SPIN" Text
   - Löst die Roulette-Funktionalität aus

5. **Loading-Indikator**
   - Spinner-Animation während des Ladens
   - "Roulette läuft..." Text

### 2. JavaScript-Funktionalität

**Hauptskript** (`public/js/roulette.js`)
**Zweck**: Client-seitige Logik und API-Kommunikation

**Funktionen**:

1. **Event Listener**
   - Wartet auf DOM-Laden
   - Registriert Click-Event für Spin-Button

2. **Spin-Funktionalität**
   - Deaktiviert Button während des Ladens
   - Zeigt Loading-Indikator
   - Simuliert 2-Sekunden-Verzögerung für bessere UX
   - Sammelt ausgewählte Waffenklassen
   - Validiert Filterauswahl
   - Macht API-Aufruf an `/api/spin-filtered`

3. **Filter-Verwaltung**
   - `getSelectedClasses(name)`: Sammelt alle ausgewählten Checkboxen
   - Unterstützt mehrere Waffenklassen pro Waffe

4. **Ergebnis-Anzeige**
   - `displayCharacter(character)`: Zeigt Charakter-Ergebnis an
   - `displayWeapon(weapon, resultElement)`: Zeigt Waffen-Ergebnis an
   - Verwendet CSS-Klassen für Animationen

5. **Fehlerbehandlung**
   - Try-Catch-Block für API-Aufrufe
   - Benutzerfreundliche Fehlermeldungen
   - Fallback-Text bei Problemen

### 3. CSS-Styling

**Stylesheet** (`public/css/roulette.css`)
**Zweck**: Visuelles Design und Animationen

**Design-Features**:

1. **Farbschema**
   - **Hintergrund**: Dunkler Gradient (Blau-Schwarz)
   - **Primärfarben**: 
     - Rot (#ff6b6b) für Akzente
     - Türkis (#4ecdc4) für Highlights
     - Blau (#45b7d1) für Ergänzungen

2. **Layout**
   - **Container**: Max-Breite 1200px, zentriert
   - **Grid-System**: Flexbox-basiertes Layout
   - **Responsive Design**: Mobile-first Ansatz

3. **Komponenten-Styling**
   - **Header**: Gradient-Text mit Glow-Effekt
   - **Roulette-Sektionen**: Glasmorphismus-Design
   - **Filter-Bereiche**: Transparente Hintergründe
   - **Ergebnis-Karten**: Glow-Animationen

4. **Animationen**
   - **Hover-Effekte**: Transform und Shadow-Änderungen
   - **Winner-Glow**: Pulsierende Glow-Animation
   - **Spinner**: Rotierende Loading-Animation
   - **Transitions**: Smooth 0.3s Übergänge

5. **Responsive Breakpoints**
   - **Mobile (< 768px)**: Einspaltiges Layout
   - **Desktop (> 768px)**: Dreispaltiges Layout

---

## 🔄 Datenfluss und Interaktionen

### 1. Benutzer-Interaktion

1. **Seite laden**
   - Benutzer öffnet die Anwendung
   - Laravel lädt `roulette.blade.php`
   - CSS und JavaScript werden geladen

2. **Filter konfigurieren**
   - Benutzer wählt gewünschte Waffenklassen
   - Checkboxen werden gespeichert
   - Validierung erfolgt client-seitig

3. **Roulette starten**
   - Benutzer klickt "SPIN"
   - JavaScript sammelt Filter-Einstellungen
   - API-Aufruf an `/api/spin-filtered`

### 2. Backend-Verarbeitung

1. **Request-Verarbeitung**
   - `RouletteController::spinFiltered()` wird aufgerufen
   - Filter-Parameter werden extrahiert
   - Datenbankabfragen werden ausgeführt

2. **Datenbankabfragen**
   - Zufälliger Charakter wird ausgewählt
   - Waffen werden nach Klassen gefiltert
   - Zufällige Auswahl aus gefilterten Ergebnissen

3. **Response-Generierung**
   - JSON-Response wird erstellt
   - Charakter- und Waffendaten werden zurückgegeben

### 3. Frontend-Update

1. **Daten-Empfang**
   - JavaScript verarbeitet API-Response
   - Ergebnisse werden validiert

2. **UI-Update**
   - Charakter wird in der ersten Sektion angezeigt
   - Waffe 1 wird in der zweiten Sektion angezeigt
   - Waffe 2 wird in der dritten Sektion angezeigt

3. **Animationen**
   - Winner-Glow-Effekt wird aktiviert
   - Loading-Indikator wird ausgeblendet
   - Button wird wieder aktiviert

---

## 🚀 Installation und Setup

### 1. Voraussetzungen
- PHP 8.2 oder höher
- Composer
- Node.js und npm (für Frontend-Assets)

### 2. Installation
```bash
# Repository klonen
git clone [repository-url]
cd laravel

# Dependencies installieren
composer install
npm install

# Umgebungsvariablen konfigurieren
cp .env.example .env
php artisan key:generate

# Datenbank einrichten
php artisan migrate
php artisan db:seed

# Frontend-Assets kompilieren
npm run dev

# Server starten
php artisan serve
```

### 3. Datenbank-Seeding
```bash
# Alle Seeder ausführen
php artisan db:seed

# Einzelne Seeder ausführen
php artisan db:seed --class=CharacterSeeder
php artisan db:seed --class=WeaponSeeder
```

---

## 🧪 Testing

### 1. PHPUnit Tests
```bash
# Alle Tests ausführen
php artisan test

# Spezifische Tests
php artisan test --filter=RouletteControllerTest
```

### 2. Test-Struktur
- **Feature Tests**: Testen der API-Endpunkte
- **Unit Tests**: Testen der Model-Methoden
- **Browser Tests**: Testen der Frontend-Funktionalität

---

## 🔧 Konfiguration

### 1. Umgebungsvariablen (`.env`)
```env
APP_NAME="Apex Legends Roulette"
APP_ENV=local
APP_DEBUG=true
APP_URL=http://localhost:8000

DB_CONNECTION=sqlite
DB_DATABASE=/absolute/path/to/database.sqlite
```

### 2. Cache-Konfiguration
```bash
# Cache leeren
php artisan config:clear
php artisan cache:clear
php artisan view:clear
```

---

## 📱 Responsive Design

### 1. Breakpoints
- **Mobile**: < 768px (Einspaltiges Layout)
- **Tablet**: 768px - 1024px (Angepasstes Layout)
- **Desktop**: > 1024px (Vollständiges Layout)

### 2. Mobile-Features
- Touch-freundliche Buttons
- Optimierte Checkbox-Größen
- Angepasste Schriftgrößen
- Vertikales Layout für kleine Bildschirme

---

## 🔒 Sicherheit

### 1. CSRF-Schutz
- CSRF-Token in Blade-Template eingebettet
- API-Routen verwenden `web` Middleware
- Sichere Formular-Übermittlung

### 2. Input-Validierung
- Client-seitige Validierung in JavaScript
- Server-seitige Validierung in Controller
- Sanitized Input-Parameter

### 3. SQL-Injection-Schutz
- Laravel Eloquent ORM
- Prepared Statements
- Parameter-Binding

---

## 📊 Performance-Optimierungen

### 1. Frontend
- Minifizierte CSS/JS-Dateien
- Optimierte Bilder (SVG-Icons)
- Lazy Loading für bessere UX
- CSS-Animationen mit GPU-Beschleunigung

### 2. Backend
- Eloquent Query-Optimierung
- Effiziente Datenbankabfragen
- Caching-Strategien
- Optimierte Response-Zeiten

---

## 🔮 Erweiterungsmöglichkeiten

### 1. Geplante Features
- Benutzer-Authentifizierung
- Speichern von Lieblings-Kombinationen
- Statistiken und Verlauf
- Mehrsprachigkeit (DE/EN)

### 2. Technische Verbesserungen
- Vue.js/React Integration
- Real-time Updates mit WebSockets
- Progressive Web App (PWA)
- API-Dokumentation mit Swagger

### 3. Gaming-Features
- Team-Builder
- Strategie-Tipps
- Meta-Analysen
- Community-Features

---

## 📝 Wartung und Updates

### 1. Regelmäßige Aufgaben
- Composer Dependencies aktualisieren
- Laravel Framework Updates
- Sicherheits-Patches
- Datenbank-Optimierungen

### 2. Monitoring
- Error Logs überwachen
- Performance-Metriken
- Benutzer-Feedback sammeln
- API-Response-Zeiten tracken

---

## 📚 Fazit

Das **Apex Legends Roulette** Projekt demonstriert eine moderne, skalierbare Webanwendung mit:

- **Saubere Architektur**: MVC-Pattern mit klarer Trennung der Verantwortlichkeiten
- **Moderne Frontend-Technologien**: Vanilla JavaScript mit modernen CSS-Features
- **Robuste Backend-Logik**: Laravel mit Eloquent ORM und RESTful APIs
- **Responsive Design**: Mobile-first Ansatz mit modernen CSS-Techniken
- **Erweiterbarkeit**: Modulare Struktur für zukünftige Features

Die Anwendung bietet eine intuitive Benutzeroberfläche für Apex Legends Spieler und kann als Grundlage für weitere Gaming-bezogene Features dienen.
