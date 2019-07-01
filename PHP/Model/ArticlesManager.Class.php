<?php

//Mise en forme : !NomClasse!, !varobject!, !table!, !attributs!, :!:attributs!, !arrayObject!, getters/setters

class ArticlesManager
{

    public static function add(Articles $varobject)
    {
        $db = DbConnect::getDb(); // Instance de PDO.
        // Pr�paration de la requ�te d'insertion.
        $q = $db->prepare('INSERT INTO articles (titre, contenu, date_articles) VALUES(:titre, :contenu:, :date_articles)');

        // Assignation des valeurs pour le nom, le pr�nom.
        $q->bindValue(':titre', $varobject->getTitre());
        $q->bindValue(':contenu', $varobject->getContenu());
        $q->bindValue(':date_articles', $varobject->getDate_articles());
    
        // Ex�cution de la requ�te.
        $q->execute();

    }

    public static function delete(Articles $varobject)
    {
        $db = DbConnect::getDb(); // Instance de PDO.
        // Ex�cute une requ�te de type DELETE.
        $db->exec('DELETE FROM articles WHERE id = ' . $varobject->getId());
    }

    public static function getById($id)
    {
        $db = DbConnect::getDb(); // Instance de PDO.
        // Ex�cute une requ�te de type SELECT avec une clause WHERE, et retourne un objet !NomClasse!.
        $id = (int) $id;

        $q = $db->query('SELECT id_articles, titre, contenu, date_article FROM articles WHERE id = ' . $id);
        $donnees = $q->fetch(PDO::FETCH_ASSOC);

        return new Articles($donnees);
    }

    public static function getList()
    {
        $db = DbConnect::getDb(); // Instance de PDO.
        // Retourne la liste de tous les !NomTable!.

        $q = $db->query('SELECT id_articles, titre, contenu, date_article FROM articles ORDER BY nom');

        if ($donnees = $q->fetch(PDO::FETCH_ASSOC)) {//test si la requête renvoi des données
            do {
                $arrayObject[] = new Articles($donnees);
            } while ($donnees = $q->fetch(PDO::FETCH_ASSOC));
            return $arrayObject;
        } else {
            return null;
        }
    }

    public static function update(Articles $varobject)
    {
        $db = DbConnect::getDb(); // Instance de PDO.
        // Pr�pare une requ�te de type UPDATE.
        $q = $db->prepare('UPDATE articles SET  id_articles=:id_articles, titre=:titre, contenu=:contenu, date_article=:date_article WHERE id_articles = :id_articles');

        // Assignation des valeurs � la requ�te.
        $q->bindValue(':id_articles', $varobject->getId_articles());
        $q->bindValue(':titre', $varobject->getTitre());
        $q->bindValue(':contenu', $varobject->getContenu());
        $q->bindValue(':date_articles', $varobject->getDate_articles());
        
        // Ex�cution de la requ�te.
        $res = $q->execute();
    }
}
