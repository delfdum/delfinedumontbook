<?php // Sur cette page, on va récuperer les dernieres données remplies dans le formulaire et les mettre dans le tableau de données dans phpmyadmin.
// il y a 2 sortes de données à récuperer
// 1 avec INSERT TO où on part d'un nouveau projet - l'utilisateur a été sur la page du site dans AJOUTER NOUVEAU PROJET.
// 2- avec UPDATE pour modifier les données d'un projet existant, un projet modifié ?>

<?php
include '../../config.php';

if(empty($_SESSION["connected_user"])){
  header ("location: connexion.php");
  exit;
}

//ON VA INSERER UN NOUVEAU PROJET
if(!empty($_POST)) { //si $_POST n'est pas vide

  if($_POST["id_projet"] == "pas_de_id") { // si mon id a pour valeur pas_de_id càd je n'envoie pas d'id il faut donc que je crée un nouveau projet je vais donc INSERER dans ma table de données un nouveau projet.

    $query = $bdd -> prepare ("INSERT INTO projet (titre_projet, texte, annee_realisation, ordre) VALUES (:titre_projet, :texte , :annee_realisation , :ordre )");
        $query -> execute([
            ":titre_projet" => $_POST["titre_projet"],
            ":texte" =>  $_POST["texte"],
            ":annee_realisation" =>  $_POST["annee_realisation"],
            ":ordre" =>  $_POST["ordre"],
        ]);

        $projetID = $bdd -> lastInsertId();


//on s'occupe d'enregistrer les nouvelles techno avec le bon id du dernier projet donc $projetID
  foreach ( $_POST["technologie"] as $key => $techno) {
       $query2 = $bdd -> prepare ("INSERT INTO projet_techno ( projet_id, techno_id) VALUES ( :projet_id, :techno_id)");
       $query2 -> execute([
        ":projet_id" => $projetID,
        ":techno_id" => $techno,
      ]);
    }

    $_SESSION["success"][] = "Nous avons ajouté un nouveau projet comme identifiant $projetID";
    header("location: ../accueil.php");
    exit;

} else {
      // un id est envoyé alors je modifie un enregistrement.
      $query = $bdd -> prepare ("UPDATE projet SET
                                        titre_projet = :titre_projet,
                                        texte = :texte,
                                        annee_realisation = :annee_realisation,
                                        ordre = :ordre
                                        WHERE id_projet = :idProjet");

      $query -> execute(
          [
            ":titre_projet" => $_POST["titre_projet"],
            ":texte" => $_POST["texte"],
            ":annee_realisation" => $_POST["annee_realisation"],
            ":ordre" =>  $_POST["ordre"],
            ":idProjet" => $_POST["id_projet"],
          ]
      );

      $projetID = $_POST["id_projet"];
//INSERER LES TECHNOS
//1_je vide la table de jointure où se trouve le projet_id
$queryerase = $bdd -> prepare ("DELETE FROM projet_techno
                                      WHERE projet_id = :projet_id ");
$queryerase -> execute([":projet_id" => $projetID ]);
var_dump($queryerase);
//2- je la remplis
        foreach ( $_POST["technologie"] as $value => $key) {
             $query3 = $bdd -> prepare ("INSERT INTO projet_techno ( projet_id, techno_id) VALUES ( :projet_id, :techno_id)");
             $query3 -> execute([
              ":projet_id" => $projetID,
              ":techno_id" => $key,
            ]);
        }

  $_SESSION["success"][] = "Nous avons modifié le projet $_POST[titre_projet].";
  }
}


// IMAGESSSSSSSSSSSSSSSSSSSSS

// if(!empty($_FILES)) {
//
//     enregistrerImageProjet($_FILES["imageProjet"], "projet_1");
// }

if(!empty($_FILES["imageProjet"]["name"][0]) && $_FILES["imageProjet"]["error"][0] == 0) {
  $mon_dossier_destination = "image/projet";

$chemin_dossier_destination = CV_PATH_SITE . "/" . $mon_dossier_destination;


$chemin_fichier_destination =   $chemin_dossier_destination . "/" . $_POST["titre_projet"] . "1.jpg";
//
  move_uploaded_file($_FILES ["imageProjet"]["tmp_name"][0], $chemin_fichier_destination);
}

if(!empty($_FILES["imageProjet"]["name"][1]) && $_FILES["imageProjet"]["error"][1] == 0) {
  $mon_dossier_destination = "image/projet";

$chemin_dossier_destination = CV_PATH_SITE . "/" . $mon_dossier_destination;


$chemin_fichier_destination =   $chemin_dossier_destination . "/" . $_POST["titre_projet"] . "2.jpg";
//
  move_uploaded_file($_FILES ["imageProjet"]["tmp_name"][1], $chemin_fichier_destination);
}

changeDePage(CV_URL_SITE . "admin/projet/projet_lister.php");






















 ?>
