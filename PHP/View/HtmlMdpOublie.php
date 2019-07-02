<!-- Affichage du formulaire qui permet la saisie -->
<form method="post" action="<?php echo serverRoot; ?>?action=">
<h1>nouveau mot de passe</h1>
	<div class="">
        <label for="password">mot de Passe :</label>
		<input type="password" name="password" id="password" />
	</div>
	<div class="espaceHorizon"></div>
	<div class="">
		<label for="confirmer">confirmer:</label>
		<input type="password" name="confirmer" id="confirmer" />
	</div>
	<div class="espaceHorizon"></div>
	<div class="">
		<input type="submit" value="valider" />
	</div>
	<div class="espaceHorizon"></div>
</form>
<div class="espaceHorizon "></div>
