<form id="signup-form" action="?controller=inscription&action=sinscrire" method="post">
    <h2>S'inscrire</h2>
    <label for="prenom">Prénom :</label>
    <input type="text" id="prenom" name="prenom" required>

    <label for="nom">Nom :</label>
    <input type="text" id="nom" name="nom" required>

    <label for="actif">Actif :</label>
    <input type="text" id="actif" name="actif" required>

    <label for="telephone">Téléphone :</label>
    <input type="text" id="telephone" name="telephone" required>

    <label for="email">E-mail :</label>
    <input type="email" id="email" name="email" required>

    <label for="mdp">Mot de passe :</label>
    <input type="password" id="mdp" name="mdp" required>

    <button type="submit">S'inscrire</button>
</form>
