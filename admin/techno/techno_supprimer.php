<?php
// Quand on a cliqué sur le lien "supprimer" dans la liste des menus.

include "../../config.php";

proteger_page();

if(!isset($_GET["technoASupprimer"])) {
    ajouterErreur("Merci de choisir la technologie à supprimer.");
} else {

    $bdd -> query("DELETE FROM technologie WHERE id_techno = " . $_GET["technoASupprimer"]);
    ajouterSuccess("La technologie a été supprimée.");

}

changeDePage(CV_URL_SITE . "admin/techno/techno_formulaire.php");
