<?php
//fichier de base qui va me servir sur toutes mes pages et m'éviter de répeter les actions ( comme la connection avec la bdd) ou simplifier( comme les chemins)
// - session-start() qui va servir à activer la variable $_SESSIOn car sinon elle ne fonctionne pas.
// - la liaison avec SQL et phpmyadmin
// - les différents chemins url.


include "fonctions_utiles.php";
include "fonctions_contenu_front.php";


session_start();

 $serveur = 'localhost';
 $utilisateur = 'root';
 $motdepasse = 'root';
 $nomBaseDeDonnees = "monbook_delf";
 //On établit la connexion
 $bdd = new PDO("mysql:host=$serveur;dbname=$nomBaseDeDonnees", $utilisateur, $motdepasse, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

//define — Définit une constante (on lui donne un nom, et sa définition ou action)
// je crée:
//- ma constante CV_URL_SITE = url du lien de mon site
define("CV_URL_SITE", "http://localhost:8888/delfinedumontbook/");

// - ma constante CV_PATH_SITE = chemin du dossier dans l'ordi où se trouve cette ligne//
define("CV_PATH_SITE", __DIR__ . "/");
//echo CV_PATH_SITE; ->affiche /Users/delphinedumont/PHP_Sites/mon_cv/

// le chemin url du template
define("URL_TEMPLATE", CV_URL_SITE . "template/site2020/");
// -> http://localhost:8888/mon_cv/template/site2020/

// le chemin du dossier dans disk dur jusqu'au template
//me sert pour dire où est mon css, mes includes...
define("PATH_TEMPLATE", CV_PATH_SITE . "template/site2020/");
//echo PATH_TEMPLATE;
// -> /Users/delphinedumont/PHP_Sites/mon_cv/template/site2020/

//constance sur le nom du site
define("NOM_DU_TITLE", "Delphine Dumont");
