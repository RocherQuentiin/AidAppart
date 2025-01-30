

    // Fonction pour afficher la section suivante après une sélection
    function showNextGroup(nextGroupId) {
        const nextGroup = document.getElementById('group-' + nextGroupId);
        if (nextGroup) {
            nextGroup.style.display = 'block'; 
        }
    }

    