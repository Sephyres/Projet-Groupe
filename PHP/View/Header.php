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
    <div id="contener">
        <header>
            <div id="log">

                <div id="titre">Les débarquements durant la seconde guerre mondial</div>
                <div id=login>Login</div>

            </div>


            <div id="barre">

                <ul id="nav">
                    <!--
            -->
                    <li><a href="#">Accueil</a></li>
                    <!--
            -->
                    <li><a href="#">Les opérations</a></li>
                    <!--
            -->
                    <li><a href="#">Zone géographique</a></li>
                    <!--
            -->
                    <li><a href="#">Forum</a></li>
                    <!--
            -->
                    <li><a href="#">Contact</a></li>
                </ul>

            </div>
        </header>
        <div id="buffer"> </div>