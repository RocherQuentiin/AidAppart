function previewImages(event) {
    const container = document.getElementById('image-upload');
    container.innerHTML = '';

    const files = event.target.files;

    if (files.length > 0) {
        const file = files[0];
        if (file.type.startsWith('image/')) {
            const reader = new FileReader();
            reader.onload = function (e) {
                const img = document.createElement('img');
                img.src = e.target.result;
                container.appendChild(img);
            };
            reader.readAsDataURL(file);
        }
    }
}
