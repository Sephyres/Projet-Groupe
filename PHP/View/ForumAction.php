<?php
if(isset($_GET['idforum']))
{
    $idforum = $_GET['idforum'];
}

switch($_GET['action'])
{
    case 'ajtCommentaireForum':
    {
        $commentaireForum = new Forum(["idUtilisateur"=>$_SESSION["id"], "contenu"=>$_POST["contenuCommentaire"], "datePost"=>"NOW()"]);
        ForumManager::add($commentaireForum);
        var_dump($commentaireForum);
        break;
    }
    case 'modifCommentaireForum':
    {
        $commentaireForum = new Forum(["idForum"=>$idforum, "datePost"=>"NOW()", "contenu"=>$_POST["contenuCommentaire"], "idUtilisateur"=>$_SESSION["id"]]);
        ForumManager::update($commentaireForum);
        break;
    }
    case 'supprCommentaireForum':
    {
        $commentaireForum = new Forum(["idForum"=>$idforum, "datePost"=>"NOW()", "contenu"=>$_POST["contenuCommentaire"], "idUtilisateur"=>$_SESSION['id']]);
        ForumManager::delete($commentaireForum);
        break;
    }
}

header("location:index.php?action=forum");

