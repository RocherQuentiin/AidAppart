
function sendMessage() {
    console.log("Formulaire soumis");
    var formData = $("#messageForm").serialize();
    formData += "&send=1";

    $.ajax({
        type: "POST",
        url: "../Controller/MessageControlleur.php",
        data: formData,
        success: function(response) {
            console.log(response); // Affiche la réponse du serveur dans la console

            if (response === "Le message a bien été envoyé") {
                $("#messageReussie").css("display", "block");

            } else {
                console.log("ERREUR");
            }
        },
        error: function(error) {
            console.log(error);
        }
    });
}