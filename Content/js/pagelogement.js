
document.addEventListener('DOMContentLoaded', () => {
    const searchButton = document.querySelector('.search-bar button');
    const filters = document.querySelectorAll('.filters input, .filters select');
    
    searchButton.addEventListener('click', handleSearch);
    filters.forEach(filter => filter.addEventListener('change', handleFilterChange));
});

function handleSearch() {
    const type = document.querySelector('.search-bar input[placeholder="Type de logement"]').value;
    const surface = document.querySelector('.search-bar input[placeholder="Surface"]').value;
    const loyerMax = document.querySelector('.search-bar input[placeholder="Loyer max"]').value;
    
    // Implement search logic here
    console.log(`Searching for: Type=${type}, Surface=${surface}, Loyer Max=${loyerMax}`);
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
    console.log('Filters:', filters);
    console.log("stringify", JSON.stringify(filters));
}