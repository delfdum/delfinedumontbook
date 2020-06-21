
<?php
include '../../config.php';

if(empty($_SESSION["connected_user"])){
  header ("location: connexion.php");
  exit;
}

if(!empty($_POST)) {
  if($_POST["id_user"] == "pas_de_id") {

    $query = $bdd -> prepare ("INSERT INTO user (nom, identifiant, motdepasse) VALUES (:nom, :identifiant , :motdepasse)");
        $query -> execute([
            ":nom" => $_POST["nom"],
            ":identifiant" =>  $_POST["identifiant"],
            ":motdepasse" =>  $_POST["motdepasse"],
        ]);

        $userID = $bdd -> lastInsertId();




$_SESSION["success"][] = "Nous avons ajouté le nouvel utilisateur $_POST[nom]";
header("location: ../accueil.php");
exit;

} else {
      // un id est envoyé alors je modifie un enregistrement.
      $query = $bdd -> prepare ("UPDATE user SET
                                        nom = :nom,
                                        identifiant = :identifiant,
                                        motdepasse = :motdepasse,
                                        WHERE id_user = :idUser");

      $query -> execute(
          [
            ":nom" => $_POST["nom"],
            ":identifiant" => $_POST["identifiant"],
            ":motdepasse" => $_POST["motdepasse"],
            ":idUser" => $_POST["id_user"],
          ]
      );

      $userID = $_POST["id_user"];

  $_SESSION["success"][] = "Nous avons modifié l'identifiant: $_POST[nom].";
  }
}



changeDePage(CV_URL_SITE . "admin/user/user_lister.php");






















 ?>
