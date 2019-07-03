<?php
// Le fichier Route permet de gérer toutes les ouvertures de pages

//on definit les constantes qui permet de definir les chemins
if (!class_exists("Parametre")) require $_SERVER["DOCUMENT_ROOT"]."/Projet-Groupe/PHP/Controller/Parametre.class.php";
Parametre::init();
Define("serverRoot", Parametre::getServerRoot());
Define("adresseRoot", $_SERVER['DOCUMENT_ROOT'] . Parametre::getAdresseRoot());
// La fonction afficherPage, prend 3 paramètres
// Le chemin où trouver les pages, le nom de la partie contenu à afficher et le titre à donner à la page
function afficherPage($chemin, $page, $titre)
{
    require $chemin . 'Header.php';
    require $chemin . $page;
    require $chemin . 'Footer.php';
}

// A l'include de la page Route, le code suivant est exécuté
// Si la variable $get existe, on exploite les informations pour afficher la bonne page
if (isset($_GET['action'])) {
    // En fonction de ce que contient la variable action de $_GET, on ouvre la page correspondante

    switch ($_GET['action']) {
        case 'main': 
        {
            afficherPage(adresseRoot . 'PHP/View/', 'Main.php', "Page Principale");
            break;
        }
        case 'connexion':
        {
            afficherPage(adresseRoot . 'PHP/View/', 'FormConnexion.php', 'Connexion');
            break;
        }
        case 'connect':
        {
            afficherPage(adresseRoot . 'PHP/View/', 'Connexion.php', 'Connexion');
            break;
        }
        case 'deconnexion':
        {
            afficherPage(adresseRoot . 'PHP/View/', 'Deconnexion.php', 'Deconnexion');
            break;
        }
        case 'inscription':
        {
            afficherPage(adresseRoot . 'PHP/View/', 'FormInscription.php', 'Inscription');
            break;
        }
        case 'inscript':
        {
            afficherPage(adresseRoot . 'PHP/View/', 'Inscription.php', 'Inscription');
            break;
        }
        //Cette action montrera le forum du pauvre, avec les commentaires postés, et permettra d'en ajouter un si l'utilisateur est log, en passant par Ajax
        case 'forum':
        {
            afficherPage(adresseRoot . 'PHP/View/', 'Forum.php', 'Forum');
            break;
        }
        case 'contact':
        {
            afficherPage(adresseRoot . 'PHP/View/', 'FormContact.php', 'Contact');
            break;
        }
        case 'mdpOublie':
        {
            afficherPage(adresseRoot . 'PHP/View/', 'FormMdpOublie.php', 'Mot de passe oublié');
            break;
        }
        case 'mdpOublieChange':
        {
            afficherPage(adresseRoot . 'PHP/View/', 'PHPMdpOublie.php', 'Mot de passe oublié');
            break;
        }
        //Cette action montrera les commentaires pour l'article fourni en GET, et permettra d'en ajouter un si l'utilisateur est log, en passant par Ajax
        case 'afficherCommentaires':
        {
            afficherPage(adresseRoot . 'PHP/View/', 'CommentaireAction.php', '');
            break;
        }
        case 'ajouterArticle':
        case 'modifierArticle':
        case 'supprimerArticle':
        {
            afficherPage(adresseRoot . 'PHP/View/', 'FormArticle.php', "Page Principale");
            break;
        }
        case 'ajtArticle':
        case 'modifArticle':
        case 'supprArticle':
        {
            afficherPage(adresseRoot . 'PHP/View/', 'ArticleAjout.php', "Page Principale");
            break;
        }
    }} else { // Sinon, on affiche la page principale du site
    afficherPage(adresseRoot . 'PHP/View/', 'debug.php', "Debug");
}
