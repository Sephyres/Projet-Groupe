<!DOCTYPE html>
<html>

<head>
    <?php

    function chargerClasse($classe)
    {
        if (file_exists(adresseRoot . "Php/Controller/" . $classe . ".class.php")) {
            require adresseRoot . "Php/Controller/" . $classe . ".class.php";
        }

        if (file_exists(adresseRoot . "Php/Model/" . $classe . ".class.php")) {
            require adresseRoot . "Php/Model/" . $classe . ".class.php";
        }
    }
    spl_autoload_register("chargerClasse");

    // initialise une connection
    DbConnect::init();
    session_start();
    //Si le titre est indiqué, on l'affiche entre les balises <title>
    echo (!empty($titre)) ? '<title>' . $titre . '</title>' : '<title> Acceuil </title>';
    ?>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <link rel="stylesheet" href="<?php echo Parametre::getAdresseRoot(); ?>CSS/default.css" />
    <link rel="stylesheet" href="<?php echo Parametre::getAdresseRoot(); ?>CSS/alt.css" />
</head>

<body>
    <header>

    </header>
    <div id="contener">