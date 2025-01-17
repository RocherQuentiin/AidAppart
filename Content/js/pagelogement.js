document.addEventListener('DOMContentLoaded', () => {
    const searchButton = document.querySelector('.search-bar button');
    const filters = document.querySelectorAll('.filters input, .filters select');
    
    searchButton.addEventListener('click', handleSearch);
    filters.forEach(filter => filter.addEventListener('change', handleFilterChange));
    handleFilterChange(); // lance une recherche par défaut
});

function handleSearch() {
    const type = document.querySelector('.search-bar input[placeholder="Type de logement"]').value;
    const surface = document.querySelector('.search-bar input[placeholder="Surface"]').value;
    const loyerMax = document.querySelector('.search-bar input[placeholder="Loyer max"]').value;
    
    const searchParams = {
        type: type,
        surface: surface,
        loyerMax: loyerMax
    };

    fetch('?controller=pagelogement&action=search', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(searchParams)
    })
    .then(response => response.json())
    .then(data => {
        // met a jour la liste dynamiquement
        updateListings(data);
    })
    .catch(error => {
        console.error('Error:', error);
    });
}

function handleFilterChange() {
    const filters = {
        type: document.getElementById('type-logement').value,
        nbPieces: document.getElementById('nb-pieces').value,
        surfaceMin: document.getElementById('surface-min').value,
        surfaceMax: document.getElementById('surface-max').value,
        loyerMin: document.getElementById('loyer-min').value,
        loyerMax: document.getElementById('loyer-max').value,
        chargesMin: document.getElementById('charges-min').value,
        chargesMax: document.getElementById('charges-max').value,
        meuble: document.getElementById('meuble').checked,
        wifi: document.getElementById('wifi').checked,
        accessiblePMR: document.getElementById('accessible-pmr').checked,
        parking: document.getElementById('parking').checked
    };
    fetch('?controller=pagelogement&action=search', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(filters)
    })
    .then(response => response.json())
    .then(data => {
        // met a jour la liste dynamiquement
        updateListings(data);
    })
    .catch(error => {
        console.error('Error:', error);
    });
}

function updateListings(data) {
    const listingsContainer = document.querySelector('.listings');
    listingsContainer.innerHTML = ''; // vide la liste actuelle
    if (data.length === 0) {
        alert('Aucun logement trouvé');    
        return;
    }
    data.forEach(logement => {
        const listing = document.createElement('div');
        listing.classList.add('listing');
            // <a href="?controller=annonces">
        listing.innerHTML = `
             <a href="?controller=annonces&action=annonces&id=${logement.id}">
                <img src="Content/Images/Proprio_${logement.proprietaire}/Logement_${logement.id}/image_vitrine.png" alt="Image du logement">
                <p>Type: ${logement.type}</p>
                <p>Loyer: ${logement.loyer} €</p>
                <p>Charges: ${logement.charges} €</p>
                <p>Adresse : ${logement.adresse}</p>
                ${logement.est_meuble ? '<p>Meublé</p>' : ''}
                ${logement.a_WIFI ? '<p>WiFi</p> ' : ''}
                ${logement.est_accessible_PMR ? '<p>Accessible PMR</p>' : ''}
                <p>Nombre de pièces: ${logement.nb_pieces}</p>
                ${logement.a_parking ? '<p>Parking</p>' : ''}
                <p>Description: ${logement.description}</p>
            </a>
        `;
        listingsContainer.appendChild(listing);
    });   
}

