

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link rel="stylesheet" type="text/css" href="Content/css/pageinscription.css"/>
    <link rel="stylesheet" type="text/css" href="Content/css/index.css"/>
    <script src="Content/js/pageinscription.js" defer></script>
</head>
<body>
<h1>
    Inscription
</h1>

<form action="?controller=inscription&action=sinscrire" method="POST">
    <div class="dropdown">
        <button type="button" class="dropdown-btn" id="dropdownBtn">
            Status <span class="arrow"></span>
        </button>
        <ul class="dropdown-menu" id="dropdownMenu">
            <li data-value="Option 1">Option 1</li>
            <li data-value="Option 2">Option 2</li>
            <li data-value="Option 3">Option 3</li>
        </ul>
        <!-- Champ caché pour transmettre la valeur sélectionnée -->
        <input type="hidden" id="status" name="status" value="">
    </div>

    <br><br>
    <input type="text" id="nom" name="nom" placeholder="Nom">
    <input type="text" id="prenom" name="prenom" placeholder="Prénom"  >
    <br><br>
    <div class="form-section">
        <label for="pays-code"></label>
        <div class="phone-input-container" id="phone-input-container">
            <select id="pays-code" name="pays-code" class="country-code-select"  >
                <option value="+33">+33</option>
                <option value="+1">+1</option>
                <option value="+44">+44</option>
                <option value="+49">+49</option>
                <option value="+91">+91</option>
                <option value="+81">+81</option>
                <option value="+86">+86</option>
                <option value="+61">+61</option>
                <option value="+34">+34</option>
            </select>
            <div class="separator"></div><!-- Séparateur -->
            <input type="tel" id="phone" name="phone" class="phone-number-input" placeholder="Numéro de téléphone"  >
        </div>
    </div>
    <br>
    <input type="mail" id="mail" name="mail" placeholder="Votre adresse mail étudiant"  >
    <br><br>
    <i class = "envelope"></i>
    <input type="password" id="mdp" name="mdp" placeholder="Votre mot de passe" >
    <i class="eye-icon" onclick="togglePassword()"></i>
    <br><br>
    <input type="password" id="mdp_confirmation" name="mdp_confirmation" placeholder="Confirmation"  >
    <br><br>

    <label>
        <div class="Donnee">
            <input type="checkbox" id="accorddonnees" name="accorddonnees"  ><p>En m'inscrivant, j'accepte que AidAppart recueille et traite mes données personnelles</p>
        </div>
    </label>
    <label>
        <br>
        <div class="Condition">
            <input type="checkbox" id="accordCGU" name="accordCDU"  ><p>J’accepte sans réserve les Conditions Générales d’Utilisation des services AidAppart</p>
        </div>
    </label>
    <br>
    <div class="button-container">
        <button type="submit">Je m'inscris</button>
    </div>

</form>
</body>
</html>



<?php 
    if (isset($message)) {
        afficherPopup($message);
    } 
?>