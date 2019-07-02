<?php
//fichier pour appel AJAX
// on definit les parametres
require "../Controller/Parametre.class.php";
Parametre::init();
//Connection BDD
require "DbConnect.class.php";
DbConnect::init();
//Recherche en base de données
$db = DbConnect::getDb(); // Instance de PDO.

function getMessages(){
  // 1. On requête la base de données pour sortir les 20 derniers messages
  $publication = $db->query("SELECT utilisateurs_id_utilisateurs, articles_id_articles, contenu FROM commentaires ORDER BY created_at DESC LIMIT 20");
  // 2. On traite les résultats
  $com = $publication->fetchAll();
  // 3. On affiche les données sous forme de JSON
echo json_encode($com);
}

CommentairesManager::add($varobject);
