<?php
$titre = "Inscription";

if(empty($_POST['pseudo']))
{
    require adresseRoot . '/PHP/View/FormInscription.php';
}
else
{
    $pseudo_erreur1 = null;
    $pseudo_erreur2 = null;
    $mdp_erreur = null;

    //On récupère les variables
    $i = 0; // compte le nombre d'erreurs à afficher
    $temps = time();
    $pseudo = $_POST['pseudo'];
    $pass = md5($_POST['mdp']); //on hache le mot de passe avec md5
    $confirm = md5($_POST['confirm']);
    $role = 1;

    //Vérification du pseudo
    $utilisateur = UtilisateursManager::getByPseudo($pseudo);
    if($utilisateur->getIdUtilisateur() != null)
    {
        $pseudo_erreur1 = "Ce pseudo est déjà utilisé par un autre membre";
        $i++;
    }

    //Vérification du mdp
    if($pass != $confirm || empty($confirm) || empty($pass))
    {
        $mdp_erreur = "Le mot de passe et la confirmation sont différents, ou sont vides";
        $i++;
    }

    if ($i == 0) // S'il n'y a pas d'erreur
    {
        $nouvelUtilisateur = new Utilisateurs(['nom'=>$_POST['nom'], 'prenom'=>$_POST['prenom'], 'pseudo'=>$_POST['pseudo'],'mdp'=>md5($_POST['mdp']),'role'=>$role, 'login'=>$_POST['pseudo'], 'mail'=>$_POST['mail']]);

        UtilisateursManager::add($nouvelUtilisateur); // On crée l'utilisateur dans la base de données
        $nouvelUtilisateur = UtilisateursManager::getByPseudo($_POST['pseudo']); //pour récupérer l'ID
    
        echo'<h1>Inscription terminée</h1>';
        echo'<p>Bienvenue '.stripslashes(htmlspecialchars($_POST['pseudo'])).' vous êtes maintenant inscrit</p>';
        
        //Et on définit les variables de sessions
        $_SESSION['pseudo'] = $nouvelUtilisateur->getPseudo();
        $_SESSION['login'] = $nouvelUtilisateur->getLogin();
        $_SESSION['id'] = $nouvelUtilisateur->getIdUtilisateur();
        $_SESSION['role'] = $nouvelUtilisateur->getRole();
        header("refresh:3;url=index.php?action=forum");
    }
    else // on affiche les erreurs
    {
        echo'<h1>Inscription interrompue</h1>';
        echo'<p>Une ou plusieurs erreurs se sont produites pendant l incription</p>';
        echo'<p>'. $i .' erreur(s)</p>';
        echo'<p>'. $pseudo_erreur1 .'</p>';
        echo'<p>'. $pseudo_erreur2 .'</p>';
        echo'<p>'. $mdp_erreur .'</p>';
        echo '</div>';     
        header("refresh:3;url=index.php?action=inscript");
    }
}