<form method="post" action="<?php echo serverRoot; ?>?action=inscript">
    <label for="nom">Nom :</label>
    <input type="text" name="nom" id="nom" autofocus required pattern="^[A-Za-z]+$">
    <label for="prenom">Prénom :</label>
    <input type="text" name="prenom" id="prenom" required pattern="^[A-Za-z]+$">
    <label for="pseudo">Pseudo :</label>
    <input type="text" name="pseudo" id="pseudo" required pattern="^[A-Za-z0-9]+$">
    <label for="mail">Email :</label>
    <input type="text" name="mail" id="mail" required pattern="[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?">
    <label for="mdp">Mot de passe :</label>
    <input type="password" name="mdp" id="mdp" required pattern="(?=.*\d)(?=.*[@ç_])(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z@ç_]{8,30}">
    <label for="confirm">Confirmez le de passe :</label>
    <input type="password" name="confirm" id="confirm" required pattern="(?=.*\d)(?=.*[@ç_])(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z@ç_]{8,30}">

    <input type="submit" value="Valider">
    <input type="reset" value="Annuler">
</form>

