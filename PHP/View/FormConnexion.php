<form method="post" action="<?php echo serverRoot; ?>?action=connect">
    <label for="pseudo">Pseudo :</label>
    <input type="text" name="pseudo" id="pseudo">
    <label for="mdp">Mot de passe :</label>
    <input type="password" name="mdp" id="mdp">

    <input type="submit" value="Valider">
</form>

<!-- <form method="post" action="<?php echo serverRoot; ?>?action=mdpOublie">
    <input type="submit" value="Mot de passe oublié ?">
</form>
 -->

<button><a href="/Site/?action=mdpOublie" style="text-decoration:none;color:black">Mot de passe oublié ?</a></button>

<a href="<?php echo serverRoot; ?>?action=inscription">Pas encore inscrit ?</a>
