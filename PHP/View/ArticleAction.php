<?php
if(isset($_GET['idarticle']))
{
    $idarticle = $_GET['idarticle'];
}


switch($_GET['action'])
{
    case 'ajtArticle':
    {
        $article = new Articles(["titre"=>$_POST["titreArticle"], "contenu"=>$_POST["contenuArticle"], "dateArticle"=>"NOW()"]);
        ArticlesManager::add($article);
        break;
    }
    case 'modifArticle':
    {
        $article = new Articles(["idArticle"=>$idarticle, "titre"=>$_POST["titreArticle"], "contenu"=>$_POST["contenuArticle"], "dateArticle"=>"NOW()"]);
        ArticlesManager::update($article);
        break;
    }
    case 'supprArticle':
    {
        $article = new Articles(["idArticle"=>$idarticle, "titre"=>$_POST["titreArticle"], "contenu"=>$_POST["contenuArticle"], "dateArticle"=>"NOW()"]);
        ArticlesManager::delete($article);
        break;
    }
}

header("location:index.php?action=main");
