<?php
if (isset($_POST["date"]))
    $date = $_POST["date"];
else {
    $date = "NOW()";
}

switch ($_GET["action"]) {

    case 'ajtArticle':
        $p = new Articles(["titre" => $_POST["titre"], "contenu" => $_POST["contenu"], "dateArticle" => $date]);
        ArticlesManager::add($p);
        header("location:Index.php");
        break;

    case "modifArticle":
        $_POST["idArticle"] += 0;
        $p = new Articles(["idArticle" => $_POST["idArticle"], "titre" => $_POST["titre"], "contenu" => $_POST["contenu"], "dateArticle" => $date]);
        ArticlesManager::update($p);
        header("location:Index.php");
        break;



    case "supprArticle":
        $p = ArticlesManager::getById($_POST["idArticle"]);
        ArticlesManager::delete($p);
        header("location:Index.php");
        break;
}



/* 
if (isset($edit))
    $date = $edit->getDate();
else {
    $date = "NOW()";
    echo "Nope";
}
$p = new Articles(["titre" => $_POST["titre"], "contenu" => $_POST["contenu"], "dateArticle" => $date]);
ArticlesManager::add($p);

case "modifierArticle":
    {
        $p = new Articles(["id"=>$_POST["id"],["titre" => $_POST["titre"], "contenu" => $_POST["contenu"], "dateArticle" => $date]]);
        ArticlesManager::update($p);
        break;
    }

    case "supprimmerArticle":
    {
        $p = new Articles(["id"=>$_POST["id"],["titre" => $_POST["titre"], "contenu" => $_POST["contenu"], "dateArticle" => $date]]);
        ArticlesManager::delete($p);
    }

//header("location:Index.php"); */
