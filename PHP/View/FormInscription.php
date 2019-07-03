<div id="formSignIn">
    <form method="post" action="<?php echo serverRoot; ?>?action=inscript">
        <div class="formSignInLine">
            <div class="formSignInCase"><label for="nom">Nom :</label></div>
            <div class="formSignInCase"><input type="text" name="nom" id="nom" autofocus required pattern="^[A-Za-z]+$"></div>
        </div>
        <div class="formSignInLine">
            <div class="formSignInCase"><label for="prenom">Prénom :</label></div>
            <div class="formSignInCase"><input type="text" name="prenom" id="prenom" required pattern="^[A-Za-z]+$"></div>
        </div>
        <div class="formSignInLine">
            <div class="formSignInCase"><label for="pseudo">Pseudo :</label></div>
            <div class="formSignInCase"><input type="text" name="pseudo" id="pseudo" required pattern="^[A-Za-z0-9]+$"></div>
        </div>
        <div class="formSignInLine">
            <div class="formSignInCase"><label for="mail">Email :</label></div>
            <div class="formSignInCase"><input type="text" name="mail" id="mail" required pattern="[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?"></div>
        </div>
        <div class="formSignInLine">
            <div class="formSignInCase"><label for="mdp">Mot de passe :</label></div>
            <div class="formSignInCase"><input type="password" name="mdp" id="mdp" required pattern="(?=.*\d)(?=.*[@ç_])(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z@ç_]{8,30}"></div>
        </div>
        <div class="formSignInLine">
            <div class="formSignInCase"><label for="confirm">Confirmez le Mot de passe :</label></div>
            <div class="formSignInCase"><input type="password" name="confirm" id="confirm" required pattern="(?=.*\d)(?=.*[@ç_])(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z@ç_]{8,30}"></div>
        </div>
        <div class="formSignInLine">
            <input type="submit" value="Valider">
            <input type="reset" value="Annuler">
        </div>
    </form>
</div>