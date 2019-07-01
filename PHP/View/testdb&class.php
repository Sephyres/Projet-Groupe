Test Class, Managers et DB : 

<?php

echo "Création objet<br/>";
$objet = new Utilisateurs (["IdUtilisateurs"=>1,"login"=>"Testlogin","mdp"=>"Testmdp","mail"=>"a@b.c", "nom"=> "testnom","prenom"=>"Testprenom","role"=>1,"pseudo"=>"Testpseudo"]);
var_dump($objet);
echo "Ajout objet<br/>";
UtilisateursManager::add($objet); 
echo "GetList objet<br/>";
$list = UtilisateursManager::getList();
var_dump($list[1]);
echo "GetbyId objet<br/>";
$objet2 = UtilisateursManager::getById($list[0]->getIdUtilisateur());
echo "Change objet";
$objet2->setNom("Second test nom");
echo "Update objet<br/>";
UtilisateursManager::update($objet2);
echo "Delete objet" . $objet2->getIdUtilisateur();;
UtilisateursManager::delete($objet2);