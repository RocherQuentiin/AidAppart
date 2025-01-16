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
                    <label for="MessageId">Envoyer un message à :</label>
                    <select id="MessageId" name="MessageDestinataire">
                        <?php
                        foreach ($utilisateurs as $utilisateur) {
                            if ($utilisateur['id'] != $idUtilisateurActif) {
                                echo "<option value='{$utilisateur['id']}'>{$utilisateur['nom']}</option>";
                            }
                        }
                        ?>
                    </select><br><br>
                    <label for="Message">Taper le message :</label>
                    <input type="text" id="Message" class="message" name="MessageContenu"><br>
                    <!-- action='?controller=message&action=message' -->
                    <button type="submit" >Envoyer</button>
                    <input type="hidden" name="send" value="1">
                    <p>
                        <span id="messageReussie" style="display: none; color: green;">Le message a bien été envoyé</span>
                    </p>
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
