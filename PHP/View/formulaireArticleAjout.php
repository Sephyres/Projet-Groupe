<div id="DivSousTitre">
	<h5>Ajouter un nouvel article</h5>
</div>
<form id="formulaire" method="post" action="/PHP/View/ArticleAjout.php">
    <!-- Quand le formulaire sera soumit par clic sur le bouton, les informations qu il contient seront stockées dans la variable $_POST, parce que la methode post a été sélectionnée -->
	Titre :<br>
	<input type="text" name="titre" ><br><br> 
	Contenu : <br>
	<input type="text" name="contenu"><br><br> 
	

	<input type="submit" value="valider" />
	<input type="reset" value="annuler" />
	

</form>