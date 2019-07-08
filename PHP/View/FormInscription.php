<form method="post" action="<?php echo serverRoot; ?>?action=inscript">
<div class="ligneInscrip">
    <label for="nom">Nom :</label>
    <input type="text" name="nom" id="nom" autofocus required pattern="[A-Za-zâäàéèùêëîïôöçñ-]{2,}"> 
    <div class="boutonVert"><img src="<?php echo Parametre::getAdresseRoot(); ?>IMAGES/V2.png" width="20"></div>
    <div class="boutonRouge"><img src="<?php echo Parametre::getAdresseRoot(); ?>IMAGES/X2.png" width="20"></div>
    <span class="messageErreur"></span>
</div>
<div class="ligneInscrip">
    <label for="prenom">Prénom :</label>
    <input type="text" name="prenom" id="prenom" required pattern="[A-Za-zâäàéèùêëîïôöçñ-]{2,}">
    <div class="boutonVert"><img src="<?php echo Parametre::getAdresseRoot(); ?>IMAGES/V2.png" width="20"></div>
    <div class="boutonRouge"><img src="<?php echo Parametre::getAdresseRoot(); ?>IMAGES/X2.png" width="20"></div>
    <span class="messageErreur"></span>
</div>
<div class="ligneInscrip">
    <label for="pseudo">Pseudo :</label>
    <input type="text" name="pseudo" id="pseudo" required pattern="[A-Za-zâäàéèùêëîïôöçñ0-9_-]{6,15}">
    <div class="boutonVert"><img src="<?php echo Parametre::getAdresseRoot(); ?>IMAGES/V2.png" width="20"></div>
    <div class="boutonRouge"><img src="<?php echo Parametre::getAdresseRoot(); ?>IMAGES/X2.png" width="20"></div>
    <span class="messageErreur"></span>
</div>
<div class="ligneInscrip">
    <label for="mail">Email :</label>
    <input type="text" name="mail" id="mail" required pattern="[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?">
    <div class="boutonVert"><img src="<?php echo Parametre::getAdresseRoot(); ?>IMAGES/V2.png" width="20"></div>
    <div class="boutonRouge"><img src="<?php echo Parametre::getAdresseRoot(); ?>IMAGES/X2.png" width="20"></div>
    <span class="messageErreur"></span>
</div>
<div class="ligneInscrip">
    <label for="mdp">Mot de passe :</label>
    <input type="password" name="mdp" id="mdp" required pattern="(?=.*\d)(?=.*[@ç_])(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z@ç_+-]{8,30}">
    <div class="boutonVert"><img src="<?php echo Parametre::getAdresseRoot(); ?>IMAGES/V2.png" width="20"></div>
    <div class="boutonRouge"><img src="<?php echo Parametre::getAdresseRoot(); ?>IMAGES/X2.png" width="20"></div>
    <div id="oeil"><img src="<?php echo Parametre::getAdresseRoot(); ?>IMAGES/oeil.png" width="25"></div>
    <span class="messageErreur"></span>
</div>
<div class="ligneInscrip">
    <label for="confirm">Confirmez le de passe :</label>
    <input type="password" name="confirm" id="confirm" required pattern="(?=.*\d)(?=.*[@ç_])(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z@ç_]{8,30}">
    <div class="boutonVert"><img src="<?php echo Parametre::getAdresseRoot(); ?>IMAGES/V2.png" width="20"></div>
    <div class="boutonRouge"><img src="<?php echo Parametre::getAdresseRoot(); ?>IMAGES/X2.png" width="20"></div>
    <span class="messageErreur"></span>
</div>
<div class="btn">
    <input id="submitInscription" type="submit" value="Valider"> 
    <input type="reset" value="Annuler" onclick='location.href="index.php?action=main"'>
</div>
</form>

