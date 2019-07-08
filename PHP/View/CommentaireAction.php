<?php 

if(isset($_GET['idarticle']))
{
    $idarticle = $_GET['idarticle'];
}

switch($_GET['action'])
{
    case 'ajtCommentaireArticle':
    {
        $commentaireArticle = new Commentaires(['dateCommentaire'=>"NOW()", 'contenu'=>$_POST['contenu'], 'idUtilisateur'=>$_SESSION['id'], 'idArticle'=>$_POST['idarticle']]);
        CommentairesManager::add($commentaireArticle);
        break;
    }
    case 'modifCommentaireArticle':
    {
        $commentaireArticle = new Commentaires(['dateCommentaire'=>"NOW()", 'idCommentaire'=>$_POST['idCommentaire'], 'contenu'=>$_POST['contenu'], 'idUtilisateur'=>$_SESSION['id'], 'idArticle'=>$_POST['idarticle']]);
        CommentairesManager::update($commentaireArticle);
        break;
    }
    case 'supprCommentaireArticle':
    {
        $commentaireArticle = new Commentaires(['dateCommentaire'=>"NOW()", 'idCommentaire'=>$_POST['idCommentaire'], 'contenu'=>$_POST['contenu'], 'idUtilisateur'=>$_SESSION['id'], 'idArticle'=>$_POST['idarticle']]);
        CommentairesManager::delete($commentaireArticle);
        break;
    }
}

//header("location:index.php?action=main");


?>