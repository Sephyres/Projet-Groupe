<?php
$titre = "Connexion";
if (!isset($_POST['pseudo'])) //Si la variable $_POST['pseudo'] n'est pas déclarée
{
    //on affiche le formulaire de connexion
    require adresseRoot . 'PHP/View/FormConnexion.php';
} else //le formulaire a été validé
{
    $message = '';
    // si un champ a été oublié, on affiche un message d'erreur et on rafraichit la page
    if (empty($_POST['pseudo']) || empty($_POST['mdp'])) {
        $message = "<p>Une erreur s'est produite pendant votre identification.
                    Vous devez remplir tous les champs</p>";
        echo '<div class="ligne">' . $message . '</div>';
        header('refresh:3;url=index.php?action=connexion');
    } else //sinon, on vérifie que le mot de passe entré correspond bien à celui de la base de données
    {
        //on cherche l'utilisateur dans la base de donnée
        $utilisateur = UtilisateursManager::getByPseudo($_POST['pseudo']);

        //si le mot de passe de la base de donnée est est le même que celui entré dans le formulaire de connexion
        if ($utilisateur->getMdp() == md5($_POST['mdp'])) {
            $_SESSION['id'] = $utilisateur->getIdUtilisateur();
            $_SESSION['pseudo'] = $utilisateur->getPseudo();
            $_SESSION['login'] = $utilisateur->getLogin();
            $_SESSION['role'] = $utilisateur->getRole();
            $message = '<p>Bienvenue ' . $utilisateur->getPseudo() . ', vous êtes maintenant connecté. </p>';
            echo $message;
            header("refresh:3; url=index.php?action=forum");
        } else {
            $message = '<p>Une erreur s\'est produite pendant votre identification. <br> Le mot de passe ou le pseudo entré n\'est pas correct.</p>';
            echo '<div class="ligne">' . $message . '</div>';
            header("refresh:3; url=index.php?action=connect");
        }
    }
}
