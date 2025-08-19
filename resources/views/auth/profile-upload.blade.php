<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profilbild hochladen - Roulette</title>
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
</head>
<body>
    <div class="auth-container">
        <div class="auth-card">
            <div class="auth-header">
                <h2>Profilbild hochladen</h2>
                <p>Willkommen {{ Auth::user()->name }}! Du kannst optional ein Profilbild hochladen oder diesen Schritt überspringen.</p>
            </div>
            
            @if ($errors->any())
                <ul class="error-message">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif

            <form class="auth-form" action="{{ route('profile.upload.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="profile-upload-area">
                    <div class="upload-icon">
                        <svg stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                            <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </div>
                    <div class="upload-text">
                        <strong>Datei hochladen</strong> oder per Drag & Drop
                        <input id="profile_image" name="profile_image" type="file" style="display: none;" accept="image/*">
                    </div>
                    <div class="upload-info">
                        PNG, JPG, GIF bis 2MB
                    </div>
                </div>

                <div class="button-group">
                    <button type="submit" class="auth-button">
                        Profilbild hochladen
                    </button>
                    
                    <form action="{{ route('profile.upload.skip') }}" method="POST" style="flex: 1;">
                        @csrf
                        <button type="submit" class="auth-button secondary">
                            Überspringen
                        </button>
                    </form>
                </div>
            </form>
            
            <div class="back-link">
                <a href="/">Zurück zur Startseite</a>
            </div>
        </div>
    </div>

    <script>
        // Drag & Drop Funktionalität
        const uploadArea = document.querySelector('.profile-upload-area');
        const fileInput = document.getElementById('profile_image');

        uploadArea.addEventListener('click', () => {
            fileInput.click();
        });

        uploadArea.addEventListener('dragover', (e) => {
            e.preventDefault();
            uploadArea.style.borderColor = '#4ecdc4';
            uploadArea.style.background = 'rgba(78, 205, 196, 0.1)';
        });

        uploadArea.addEventListener('dragleave', (e) => {
            e.preventDefault();
            uploadArea.style.borderColor = 'rgba(255, 255, 255, 0.3)';
            uploadArea.style.background = 'transparent';
        });

        uploadArea.addEventListener('drop', (e) => {
            e.preventDefault();
            const files = e.dataTransfer.files;
            if (files.length > 0) {
                fileInput.files = files;
            }
            uploadArea.style.borderColor = 'rgba(255, 255, 255, 0.3)';
            uploadArea.style.background = 'transparent';
        });
    </script>
</body>
</html>
