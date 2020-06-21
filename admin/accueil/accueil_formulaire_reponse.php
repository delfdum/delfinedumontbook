<?php
// Cette page reçoit les informations du formulaire qui se trouve sur formulaire_accueil.php

include "../../config.php";

proteger_page(); // on ne peut pas acceder à la page sans être connecté.

if(!empty($_POST)) {
enregistreValeur("TITRE_ACCUEIL", $_POST["titre"]);
enregistreValeur("TEXTE_ACCUEIL", $_POST["texteAccueil"]);
}

//TRAITEMENT DE L IMAGE:
// 1_on verifie si un fichier a été envoyé
// 2- si pas d'erreur d'envoie
//

if(!empty($_FILES)) { // 1_on verifie si un fichier a été envoyé
// enregistrerFichier($_FILES["imageAccueil"],  "image/accueil/accueil.jpg");
       if($_FILES["imageAccueil"]["error"] == UPLOAD_ERR_OK) {
  //           //  UPLOAD_ERR_OK = Valeur : 0. Aucune erreur, le téléchargement est correct.
  //               // un fichier a été envoyé correctement, nous devons le traiter
  //               //
  //               // 1 - nous verrifions que le chemin de destination existe, sinon nous le créons.
        $mon_dossier_destination = "image/accueil";
  // //je cree 1ere variable => je lui indique dans quel dossier où est rangé mon image
        $chemin_dossier_destination = CV_PATH_SITE . "/" . $mon_dossier_destination;
  // // je cree 2ere variable =>là je lui dis le chemin qui va vers mon dossier en utilsant __DIR__ car je ne peux utiliser d'url et je renomme mon image
        $chemin_fichier_destination =   $chemin_dossier_destination . "/" . "accueil.jpg";
  //Je lui indique où le ranger:
        move_uploaded_file($_FILES ["imageAccueil"]["tmp_name"], $chemin_fichier_destination);


        } elseif ($_FILES["imageAccueil"]["error"] == UPLOAD_ERR_FORM_SIZE) {
          ajouterErreur("Votre image est trop lourde. Elle ne doit pas dépasser 5Mo.");
        } elseif ($_FILES["imageAccueil"]["error"] == UPLOAD_ERR_NO_FILE )
        {
          ajouterErreur("Aucun fichier n'a été téléchargé.");
        } else {
          ajouterErreur("Un fichier n'a pas été enregistré.");
        }
}

ajouterSuccess("Nous avons enregistré la page d'accueil");

changeDePage(CV_URL_SITE . "admin/accueil.php");
