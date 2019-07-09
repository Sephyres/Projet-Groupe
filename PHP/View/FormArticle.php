<?php
$action = $_GET['action'];

echo '<div id="DivSousTitre">';
switch ($action) {
    case "ajouterArticle":
        {
            echo '<div class="ligne"><h3>Créer un nouvel article</h3></div>
			<form id="formulaire" method="post" action="index.php?action=ajtArticle">';
            // Quand le formulaire sera soumit par clic sur le bouton, les informations qu il contient seront stockées dans la variable $_POST, parce que la methode post a été sélectionnée
            break;
        }
    case "modifierArticle":
        {
            echo '<div class="ligne"><h3>Modifier un article</h3></div>
			<form id="formulaire" method="post" action="index.php?action=modifArticle">';
            break;
        }
}
if (isset($_GET['idarticle'])) {
	$article = ArticlesManager::getById($_GET['idarticle']);

	var_dump($article); 
}

?> 
	<input type="hidden" name="idarticle" value="<?php if(isset($article)) echo $article->getIdArticle(); ?>">

	<label for="titreArticle">Titre de l'article</label>
	<input type="text" name="titreArticle" id="titreArticle" value="<?php if(isset($article)) echo $article->getTitre(); ?>" required>

	<label for="contenuArticle">Contenu de l'article</label>
	<textarea cols="50" rows="20" name="contenuArticle" value="<?php if(isset($article)) echo $article->getContenu() ;?>" required ></textarea>
	<div class="btns">
	<?php 
	switch ($action) {
		case "ajouterArticle":
			{
				echo '<input class="btnAjouter" type="submit" value="Ajouter l\'article">'; break;
			}
		case "modifierArticle":
			{
				echo '<input class="btnModifier" type="submit" value="Modifier">'; break;
			}
		}
	?>
	<input type="reset" value="Annuler" onclick='location.href="index.php?action=main"'></div>
	</div>
</form>
