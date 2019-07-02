<?php
include "header.php";
$p = new Articles(["titre"=>$_POST["titre"],"contenu"=>$_POST["contenu"]]);
ArticlesManager::add($p);
header ("location:Liste.php");
?>