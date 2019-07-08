<?php
$titre="changer votre mot de passe";

require adresseRoot.'/Php/View/HtmlMdpOublie.php'; // On affiche le formulaire

$db = DbConnect::getDb(); // Instance de PDO.

$newmdp = md5($_POST['password']);
$confirm = md5($_POST['confirm']);

/*if ($utilisateur->getPassword()==$newmdp)
{
    $pseudo_erreur1 = "vous devez utiliser un nouveau mot de passe";
}

//Vérification du mdp
if ($pass != $confirm || empty($confirm) || empty($pass))
{
    $mdp_erreur = "Votre mot de passe et votre confirmation sont différents, ou sont vides";
}*/

// Pr�pare une requ�te de type UPDATE.
$q = $db->prepare('UPDATE utilisateurs mdp=:mdp WHERE IdUtilisateur = :IdUtilisateur');
// Assignation des valeurs � la requ�te.
$q->bindValue(':mdp', $utilisateur->getMdp());
// Ex�cution de la requ�te.
$res = $q->execute();
