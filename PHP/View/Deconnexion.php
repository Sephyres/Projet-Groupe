<?php

session_destroy();
$titre="Déconnexion";

echo '<div class="ligne">A bientôt ' . $_SESSION['pseudo'] . ', Vous êtes à présent déconnecté.</div>';
header("refresh:3;url=index.php");
?>