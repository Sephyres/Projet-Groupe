<div id="DivSousTitre">
	<h5>Ajouter un nouvel article</h5>
</div>
<form id="formulaire" method="post" action="index.php?action=ajtArticle">
	<!-- Quand le formulaire sera soumit par clic sur le bouton, les informations qu il contient seront stockées dans la variable $_POST, parce que la methode post a été sélectionnée -->
	Titre :<br>
	<input type="text" name="titre"><br><br>
	Contenu : <br>
	<textarea cols="150" rows="75" name="contenu" <?php if (isset($_POST["contenu"])) echo "value= " .$_POST["contenu"] ;?>></textarea><br><br>


	<input type="submit" value="valider" />
	<input type="reset" value="annuler" />


</form>