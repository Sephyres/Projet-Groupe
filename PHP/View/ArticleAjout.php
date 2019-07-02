<?php
if (isset($edit))
    $date = $edit->getDate();
else {
    $date = "NOW()";
    echo "Nope";
}
$p = new Articles(["titre" => $_POST["titre"], "contenu" => $_POST["contenu"], "dateArticle" => $date]);
ArticlesManager::add($p);
//header("location:Index.php");
