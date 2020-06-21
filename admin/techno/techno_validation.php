<?php
//étape 3 : on crée le lien entre le navigateur-php-et la base de donnee sur adminMysql:
include '../../config.php';
// VERIF CONNEXION, on est bien connecté:
      if(empty($_SESSION["connected_user"])) {
          // si ma variable de SESSION de connection est vide -> c'est que je ne suis pas connecté, donc je retourne à l'accueil admin
          header("location: connexion.php");
            exit;
      }


      if(!empty($_POST)) {
          if($_POST["id_techno"] == 0) {
              // je n'envoie pas d'ID donc je dois ajouter un nouveau menu
    $ajout_techno = $bdd -> prepare ("INSERT INTO technologie (nom_techno) VALUES (:nom_techno)");
          $ajout_techno -> execute([
              ":nom_techno" => $_POST["nom_techno"],
          ]);

          $_SESSION["success"][] = "Nous avons ajouté la nouvelle technologie: $_POST[nom_techno]";
          header("location: ../techno/techno_formulaire.php");
          exit;
        }
      }
   ?>
