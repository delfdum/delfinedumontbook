<?php
// Cette page reçoit les informations du formulaire qui se trouve sur formulaire: contact_formulaire.php et va les traiter avec la bdd

include "../../config.php";

proteger_page(); // on ne peut pas acceder à la page sans être connecté.

if(!empty($_POST)) {
enregistreValeur("MAIL", $_POST["mail"]);
enregistreValeur("TELEPHONE", $_POST["telephone"]);
enregistreValeur("LINKEDIN", $_POST["linkedin"]);
}


ajouterSuccess("Nous avons enregistré les nouveaux contacts.");

changeDePage(CV_URL_SITE . "admin/accueil.php");
