<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Envoyer un Message</title>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link rel="stylesheet" href="../Content/css/MessageVue.css">
    <script src="../Assets/js/Message.js"></script>
</head>
<body>
<main>
    <nav class="main-menu">
        <div>
            <div class="user-info">
                <img src="../Content/img/airplane.png" alt="user" />
                <p>Jane Wilson</p>
            </div>
            <ul>
                <li class="nav-item ">
                    <a href="Forum.php">
                        <i class="fa fa-map nav-icon"></i>
                        <span class="nav-text">Forum</span>
                    </a>
                </li>
                <li class="nav-item active">
                    <a href="#">
                        <i class="fa fa-arrow-trend-up nav-icon"></i>
                        <span class="nav-text">Message</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="Traduction.php">
                        <i class="fa fa-compact-disc nav-icon"></i>
                        <span class="nav-text">Traduction</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="quizzName.php">
                        <i class="fa fa-circle-play nav-icon"></i>
                        <span class="nav-text">Quizz</span>
                    </a>
                </li>
            </ul>
        </div>
        <ul>
            <li class="nav-item">
                <a href="../index.php">
                    <i class="fa fa-right-from-bracket nav-icon"></i>
                    <span class="nav-text">Logout</span>
                </a>
            </li>
        </ul>
    </nav>

     <!-- FIN PARTIE GAUCHE  -->
     <section class="content">
        <div class="left-content">
            <div class="slider-container">
                <form id="messageForm" action='?controller=message&action=envoyerMessage' method="post">
                    <label for="MessageId">Envoyer un message à :</label>
                    <select id="MessageId" name="MessageDestinataire">
                        <?php
                        foreach ($utilisateurs as $utilisateur) {
                            if ($utilisateur['utilisateurID'] != $idUtilisateurActif) {
                                echo "<option value='{$utilisateur['utilisateurID']}'>{$utilisateur['nomUtilisateur']}</option>";
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
                    echo "<p> L'utilisateur : {$message['expediteurNom']} vous a envoyer un message";
                    echo "Le Message reçu est : {$message['message']}";
                    echo "Date d'envoi: {$message['dateEnvoi']}";
                    echo "<hr></p>";
                }
                ?>
            </div>
        </div>
    </section>
</main>
</body>
</html>
