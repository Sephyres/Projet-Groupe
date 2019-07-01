<?php

//Mise en forme : !NomClasse!, !varobject!, !table!, !attributs!, :!:attributs!, !arrayObject!, getters/setters

class CommentairesManager
{

    public static function add(Commentaires $varobject)
    {
        $db = DbConnect::getDb(); // Instance de PDO.
        // Pr�paration de la requ�te d'insertion.
        $q = $db->prepare('INSERT INTO articles (date, contenu, utilisateurs_id_utilisateurs, articles_id_articles) VALUES(:date, :contenu:, utilisateurs_id_utilisateurs, :articles_id_articles)');

        // Assignation des valeurs pour le nom, le pr�nom.
        $q->bindValue(':date', $varobject->getDate());
        $q->bindValue(':contenu', $varobject->getContenu());
        $q->bindValue(':utilisateurs_id_utilisateurs', $varobject->getUtilisateurs_id_utilisateurss());
        $q->bindValue(':articles_id_articles', $varobject->getArticles_id_articles());
    
        // Ex�cution de la requ�te.
        $q->execute();

    }

    public static function delete(Commentaires $varobject)
    {
        $db = DbConnect::getDb(); // Instance de PDO.
        // Ex�cute une requ�te de type DELETE.
        $db->exec('DELETE FROM commentaire WHERE id_commentaires = ' . $varobject->getId_commentaires());
    }

    public static function getById($id)
    {
        $db = DbConnect::getDb(); // Instance de PDO.
        // Ex�cute une requ�te de type SELECT avec une clause WHERE, et retourne un objet !NomClasse!.
        $id = (int) $id;

        $q = $db->query('SELECT id_commentaires, date, utilisateurs_id_utilisateurs, articles_id_articles FROM commentaires WHERE id_commentaires = ' . $id);
        $donnees = $q->fetch(PDO::FETCH_ASSOC);

        return new Commentaires($donnees);
    }

    public static function getList()
    {
        $db = DbConnect::getDb(); // Instance de PDO.
        // Retourne la liste de tous les !NomTable!.

        $q = $db->query('SELECT id_commentaires, date, utilisateurs_id_utilisateurs, articles_id_articles FROM commentaires ORDER BY nom');

        if ($donnees = $q->fetch(PDO::FETCH_ASSOC)) {//test si la requête renvoi des données
            do {
                $arrayObject[] = new Commentaires($donnees);
            } while ($donnees = $q->fetch(PDO::FETCH_ASSOC));
            return $arrayObject;
        } else {
            return null;
        }
    }

    public static function update(Commentaires $varobject)
    {
        $db = DbConnect::getDb(); // Instance de PDO.
        // Pr�pare une requ�te de type UPDATE.
        $q = $db->prepare('UPDATE commentaires SET  id_commentaires=:id_commentaires, date=:date, contenu=:contenu, utilisateurs_id_utilisateurs=:utilisateurs_id_utilisateurs, articles_id_articles=:articles_id_articles WHERE id_articles = :id_articles');

        // Assignation des valeurs � la requ�te.
        $q->bindValue(':id_commentaires', $varobject->getId_commentaires());
        $q->bindValue(':date', $varobject->getDate());
        $q->bindValue(':contenu', $varobject->getContenu());
        $q->bindValue(':utilisateurs_id_utilisateurs', $varobject->getUtilisateurs_id_utilisateurss());
        $q->bindValue(':articles_id_articles', $varobject->getArticles_id_articles());
        
        // Ex�cution de la requ�te.
        $res = $q->execute();
    }
}
