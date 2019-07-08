<form method="post" action="<?php echo serverRoot; ?>?action=connect">
    <label for="pseudo">Pseudo :</label>
    <input type="text" name="pseudo" id="pseudo" autofocus required>
    <label for="mdp">Mot de passe :</label>
    <input type="password" name="mdp" id="mdp" required>

    <input type="submit" value="Connexion">
</form>

<!-- <form method="post" action="<?php echo serverRoot; ?>?action=mdpOublie">
    <input type="submit" value="Mot de passe oublié ?">
</form>
 -->

<button><a class="noDeco" href="/Site/?action=mdpOublie">Mot de passe oublié ?</a></button>

<p>Pas encore inscrit? <a id="lienCreerCompte" href="<?php echo serverRoot; ?>?action=inscription">Créez un compte.</a></p>
