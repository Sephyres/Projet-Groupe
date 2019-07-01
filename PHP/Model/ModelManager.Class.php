<?php

//Mise en forme : !NomClasse!, !varobject!, !table!, !attributs!, :!:attributs!, !arrayObject!, getters/setters

class !NomClasse!Manager
{

    public static function add(!NomClasse! $!varobject!)
    {
        $db = DbConnect::getDb(); // Instance de PDO.
        // Pr�paration de la requ�te d'insertion.
        $q = $db->prepare('INSERT INTO !table! (!attributs!) VALUES(:!:attributs!)');

        // Assignation des valeurs pour le nom, le pr�nom.
        $q->bindValue(':!:attributs!', $!varobject!->getter());
    

        // Ex�cution de la requ�te.
        $q->execute();

    }

    public static function delete(!NomClasse! $!varobject!)
    {
        $db = DbConnect::getDb(); // Instance de PDO.
        // Ex�cute une requ�te de type DELETE.
        $db->exec('DELETE FROM !table! WHERE id = ' . $!varobject!->getId());
    }

    public static function getById($id)
    {
        $db = DbConnect::getDb(); // Instance de PDO.
        // Ex�cute une requ�te de type SELECT avec une clause WHERE, et retourne un objet !NomClasse!.
        $id = (int) $id;

        $q = $db->query('SELECT !attributs! FROM !NomTable! WHERE id = ' . $id);
        $donnees = $q->fetch(PDO::FETCH_ASSOC);

        return new !NomClasse!($donnees);
    }

    public static function getList()
    {
        $db = DbConnect::getDb(); // Instance de PDO.
        // Retourne la liste de tous les !NomTable!.

        $q = $db->query('SELECT !attributs! FROM !NomTable! ORDER BY nom');

        if ($donnees = $q->fetch(PDO::FETCH_ASSOC)) {//test si la requête renvoi des données
            do {
                $!arrayObject![] = new !NomClasse!($donnees);
            } while ($donnees = $q->fetch(PDO::FETCH_ASSOC));
            return $!arrayObject!;
        } else {
            return null;
        }
    }

    public static function update(!NomClasse! $!varobject!)
    {
        $db = DbConnect::getDb(); // Instance de PDO.
        // Pr�pare une requ�te de type UPDATE.
        $q = $db->prepare('UPDATE !NomTable! SET !attributs!=:!:attributs! WHERE id = :id');

        // Assignation des valeurs � la requ�te.
        $q->bindValue(':!:attributs!', $!varobject!->getter());
        
        // Ex�cution de la requ�te.
        $res = $q->execute();
    }

}
