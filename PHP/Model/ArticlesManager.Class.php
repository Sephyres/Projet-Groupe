<?php

//Mise en forme : !NomClasse!, !varobject!, !table!, !attributs!, :!:attributs!, !arrayObject!, getters/setters

class ArticlesManager
{

    public static function add(Articles $varobject)
    {
        $db = DbConnect::getDb(); // Instance de PDO.
        // Pr�paration de la requ�te d'insertion.
        $q = $db->prepare('INSERT INTO Articles (titre, contenu, dateArticle) VALUES (:titre, :contenu, NOW())');
        //$q = $db->prepare('INSERT INTO articles (titre, contenu, dateArticle) VALUES("1", "2", "2016-06-01")');


        // Assignation des valeurs pour le nom, le pr�nom.
        $q->bindValue(':titre', $varobject->getTitre());
        $q->bindValue(':contenu', $varobject->getContenu());

        // Ex�cution de la requ�te.
        $return = $q->execute();
    }

    public static function delete(Articles $varobject)
    {
        $db = DbConnect::getDb(); // Instance de PDO.
        // Ex�cute une requ�te de type DELETE.

        $res = $db->exec('DELETE FROM articles WHERE idArticle = ' . $varobject->getIdArticle());
        
    }

    public static function getById($id)
    {
        $db = DbConnect::getDb(); // Instance de PDO.
        // Ex�cute une requ�te de type SELECT avec une clause WHERE, et retourne un objet !NomClasse!.
        $q = $db->query('SELECT idArticle, titre, contenu, dateArticle FROM articles WHERE idArticle = ' . $id);
        $donnees = $q->fetch(PDO::FETCH_ASSOC);
        return new Articles($donnees);
    }

    public static function getList()
    {
        $db = DbConnect::getDb(); // Instance de PDO.
        // Retourne la liste de tous les !NomTable!.

        $q = $db->query('SELECT idArticle, titre, contenu, dateArticle FROM articles ORDER BY dateArticle');

        if ($donnees = $q->fetch(PDO::FETCH_ASSOC)) { //test si la requête renvoi des données
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
        $q = $db->prepare('UPDATE articles SET  titre=:titre, contenu=:contenu, dateArticle=:dateArticle WHERE idArticle = :idArticle');

        // Assignation des valeurs � la requ�te.
        $q->bindValue(':idArticle', $varobject->getIdArticle());
        $q->bindValue(':titre', $varobject->getTitre());
        $q->bindValue(':contenu', $varobject->getContenu());
        $q->bindValue(':dateArticle', $varobject->getDateArticle());

        // Ex�cution de la requ�te.
        $res = $q->execute();
    }
}
