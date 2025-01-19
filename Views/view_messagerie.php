<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Envoyer un Message</title>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="Content/js/messagerie.js"></script>
</head>
<body>
     <!-- FIN PARTIE GAUCHE  -->
     <section class="content">
        <div class="left-content">
            <div class="slider-container">
                <form id="messageForm" action='?controller=messagerie&action=envoyerMessage' method="post">
                       <label for="LogementId">ID du Logement:</label>
                       <input type="text" id="LogementId" name="LogementId" required>

                       <label for="MessageContenu">Message:</label>
                       <textarea id="MessageContenu" name="MessageContenu" required></textarea>

                       <input type="hidden" name="send" value="1">
                       <button type="submit">Envoyer</button>
                </form>
                <hr>
            </div>
            <!-- FIN  -->
        </div>
        <!-- DEBUT PARTIE DROITE -->
        <div class="right-content">
            <h1>Les réponses reçues</h1>
            <br>
            <div class="message-container">
                <?php
                foreach ($TousLesReponses as $message) {
                    echo "<p>L'utilisateur : {$message['expediteurNom']} vous a envoyé un message.";
                    echo "<br>Le message reçu est : {$message['message']}";
                    echo "<br>Date d'envoi : {$message['creer_a']}";
                    echo "<hr></p>";
                }
                ?>
            </div>

        </div>
    </section>
</main>
</body>
</html>
