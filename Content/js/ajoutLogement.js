function displayImages(event) {
    const files = event.target.files;
    const squares = document.querySelectorAll('.square');
    let squareIndex = 0;

    for (let i = 0; i < files.length; i++) {
        if (squareIndex >= squares.length) break;

        const file = files[i];
        const reader = new FileReader();

        reader.onload = function(e) {
            const img = document.createElement('img');
            img.src = e.target.result;
            img.style.width = '100%';
            img.style.height = '100%';
            img.style.objectFit = 'cover';

            // Find the next empty square
            while (squareIndex < squares.length && squares[squareIndex].hasChildNodes()) {
                squareIndex++;
            }

            if (squareIndex < squares.length) {
                squares[squareIndex].appendChild(img);
            }
        }

        reader.readAsDataURL(file);
    }
}