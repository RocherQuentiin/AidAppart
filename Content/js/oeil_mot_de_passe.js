function togglePassword() {
    const passwordInput = document.getElementById('password');
    const eyeIcon = document.getElementById('eye-toggle');
    if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        eyeIcon.src = "Content/images/eye_closed_icon.png"; // Change eye fermé
    } else {
        passwordInput.type = 'password';
        eyeIcon.src = "Content/images/eye_icon.png"; // Change eye ouvert
    }
}