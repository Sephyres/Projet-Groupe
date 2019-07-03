<?php
$titre="changer votre mot de passe";


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
if ($newmdp == $confirm) {
// Pr�pare une requ�te de type UPDATE.
$q = $db->prepare('UPDATE utilisateurs SET mdp=:mdp WHERE IdUtilisateur = :IdUtilisateur');
// Assignation des valeurs � la requ�te.
$q->bindValue(':mdp', $newmdp);
$q->bindValue(':IdUtilisateur', $_POST["tempUser"]);

// Ex�cution de la requ�te.
$res = $q->execute();
echo "Votre mot de passe a été changé. Retour à l'acceuil.";
header("refresh:3;url=Index.php");

}
else {
    echo "Erreur : les deux mots de passes ne sont pas identiques.";
header("refresh:3;url=Index.php");

}