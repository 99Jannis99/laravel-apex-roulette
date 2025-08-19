document.addEventListener('DOMContentLoaded', function() {
    const spinButton = document.getElementById('spin-button');
    const loading = document.getElementById('loading');
    const characterResult = document.getElementById('character-result');
    const weapon1Result = document.getElementById('weapon1-result');
    const weapon2Result = document.getElementById('weapon2-result');

    spinButton.addEventListener('click', async function() {
        // Disable button and show loading
        spinButton.disabled = true;
        loading.style.display = 'block';
        
        // Clear previous results
        characterResult.innerHTML = '<div class="placeholder">Spinning...</div>';
        weapon1Result.innerHTML = '<div class="placeholder">Spinning...</div>';
        weapon2Result.innerHTML = '<div class="placeholder">Spinning...</div>';

        try {
            // Simulate spinning delay for better UX
            await new Promise(resolve => setTimeout(resolve, 2000));

            // Get selected weapon classes
            const weapon1Classes = getSelectedClasses('weapon1_classes');
            const weapon2Classes = getSelectedClasses('weapon2_classes');

            // Validate that at least one class is selected for each weapon
            if (weapon1Classes.length === 0) {
                weapon1Result.innerHTML = '<div class="placeholder">Bitte wähle mindestens eine Waffenklasse für Waffe 1</div>';
                return;
            }
            if (weapon2Classes.length === 0) {
                weapon2Result.innerHTML = '<div class="placeholder">Bitte wähle mindestens eine Waffenklasse für Waffe 2</div>';
                return;
            }

            // Build URL with parameters
            const params = new URLSearchParams();
            params.append('weapon1_classes', weapon1Classes.join(','));
            params.append('weapon2_classes', weapon2Classes.join(','));

            // Make API call with filters
            const response = await fetch(`/api/spin-filtered?${params.toString()}`);
            
            const data = await response.json();

            // Display results with animation
            displayCharacter(data.character);
            displayWeapon(data.weapon1, weapon1Result);
            displayWeapon(data.weapon2, weapon2Result);

        } catch (error) {
            console.error('Error:', error);
            characterResult.innerHTML = '<div class="placeholder">Fehler beim Laden</div>';
            weapon1Result.innerHTML = '<div class="placeholder">Fehler beim Laden</div>';
            weapon2Result.innerHTML = '<div class="placeholder">Fehler beim Laden</div>';
        } finally {
            // Re-enable button and hide loading
            spinButton.disabled = false;
            loading.style.display = 'none';
        }
    });

    function getSelectedClasses(name) {
        const checkboxes = document.querySelectorAll(`input[name="${name}"]:checked`);
        return Array.from(checkboxes).map(cb => cb.value);
    }

    function displayCharacter(character) {
        if (!character) {
            characterResult.innerHTML = '<div class="placeholder">Kein Charakter gefunden</div>';
            return;
        }

        characterResult.innerHTML = `
            <div class="result-card winner">
                <img src="${character.image_url}" alt="${character.name}" class="result-image">
                <div class="result-name">${character.name}</div>
                <div class="result-type">${character.type}</div>
            </div>
        `;
    }

    function displayWeapon(weapon, resultElement) {
        if (!weapon) {
            resultElement.innerHTML = '<div class="placeholder">Keine Waffe gefunden</div>';
            return;
        }

        resultElement.innerHTML = `
            <div class="result-card winner">
                <img src="${weapon.image_url}" alt="${weapon.name}" class="result-image">
                <div class="result-name">${weapon.name}</div>
                <div class="result-type">${weapon.type} (${weapon.ammo_type})</div>
            </div>
        `;
    }
});
