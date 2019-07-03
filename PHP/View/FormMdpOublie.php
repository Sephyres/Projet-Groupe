
<!-- Affichage du formulaire qui permet la saisie -->
<form method="post" action="<?php echo serverRoot; ?>?action=mdpOublieChange">
<h1>nouveau mot de passe</h1>
	<div class="">
        <!-- On entre l'utilisateur temporaire qui souhaite changer son pass, ici on fixe cet utilisateur à l'user 2 pour simplifier-->
        <input type="hidden" name="tempUser" value="<?php if (isset($_GET["tmpUser"])) echo $_GET["tmpUser"]; else echo 2; ?>"
        <label for="password">Mot de Passe :</label>
		<input type="password" name="password" id="password" />
	</div>
	<div class="espaceHorizon"></div>
	<div class="">
		<label for="confirmer">Confirmez:</label>
		<input type="password" name="confirm" id="confirmer" />
	</div>
	<div class="espaceHorizon"></div>
	<div class="">
		<input type="submit" value="valider" />
	</div>
	<div class="espaceHorizon"></div>
</form>
<div class="espaceHorizon "></div>


