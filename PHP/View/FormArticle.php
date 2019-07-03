<?php

if (isset($GET["idArticle"]))
$edit = ArticlesManager::getById($GET["idArticle"]);

switch ($_GET["action"]) {
	case 'ajouterArticle':
		echo '<div id="DivSousTitre">
		<h5>Ajouter un nouvel article</h5>
	</div>
	
	<form id="formulaire" method="post" action="index.php?action=ajtArticle">
		<!-- Quand le formulaire sera soumit par clic sur le bouton, les informations qu il contient seront stockées dans la variable $_POST, parce que la methode post a été sélectionnée -->
		Titre :<br>
		<input type="text" name="titre"><br><br>
		Contenu : <br>
		<textarea cols="150" rows="75" name="contenu" <?php if (isset($_POST["contenu"])) echo "value= " .$_POST["contenu"] ;?></textarea><br><br>
	
	
		<input type="submit" value="valider" />
		<input type="reset" value="annuler" />
	
	
	</form>
	';
		break;
	
		case 'modifierArticle':
		echo '<div id="DivSousTitre">
		<h5>Modifier article</h5>
	</div>
	
	<form id="formulaire" method="post" action="index.php?action=modifArticle">
		<!-- Quand le formulaire sera soumit par clic sur le bouton, les informations qu il contient seront stockées dans la variable $_POST, parce que la methode post a été sélectionnée -->
		<input type="hidden" name="idArticle" value="' . $edit->getIdArticle() . '">
		<input type="hidden" name="date" value="' . $edit->getDateArticle() . '">
		Titre :<br>
		<input type="text" name="titre" value="' . $edit->getTitre() . '"><br><br>
		Contenu : <br>
		<textarea cols="150" rows="75" name="contenu" value="' . $edit->getContenu() . '"></textarea><br><br>
	
	
		<input type="submit" value="valider" />
		<input type="reset" value="annuler" />
	
	
	</form>';
		break;
	
		case 'supprimerArticle':
		echo 'Êtes vous sûr de bien vouloir supprimer l\'article suivant : ' . $edit->getTitre() . '
		<form id="formulaire" method="post" action="index.php?action=supprArticle">
		<input type="hidden" name="idArticle" value="' . $edit->getIdArticle() . '">
	
		<input type="submit" value="valider" />
		<input type="reset" value="annuler" />
	
	
	</form>';
		break;
	
	default:
		# code...
		break;
}

/* <div id="DivSousTitre">
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

<div id="DivSousTitre">
	<h5>Modifier article</h5>
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

<div id="DivSousTitre">
	<h5>Supprimer Article</h5>
</div>

<form id="formulaire" method="post" action="index.php?action=ajtArticle">
	<!-- Quand le formulaire sera soumit par clic sur le bouton, les informations qu il contient seront stockées dans la variable $_POST, parce que la methode post a été sélectionnée -->
	Titre :<br>
	<input type="text" name="titre"><br><br>
	Contenu : <br>
	<textarea cols="150" rows="75" name="contenu" <?php if (isset($_POST["contenu"])) echo "value= " .$_POST["contenu"] ;?>></textarea><br><br>


	<input type="submit" value="valider" />
	<input type="reset" value="annuler" />


</form> */