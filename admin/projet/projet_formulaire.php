<?php
include "../../config.php";
include "../include/entete.php";

if (empty($_SESSION["connected_user"])){
  header ("location: connexion.php");
  exit;
}

$technoACocher = $bdd -> query("SELECT * from technologie ") -> fetchAll();


if(!empty($_GET["projetAAfficher"])) {
    // si j'ai un paramètre d'URL, c'est que je modifie
    // un enregistrement déjà existant.
    $projetAModifier = $bdd -> query("SELECT * from projet where id_projet = " . $_GET["projetAAfficher"]) -> fetch();
} else { //sinon mon tableau est vide ce qui correspond à Ajouter un projet.
    $projetAModifier = [];
}

?>

<h1>Gestion des projets</h1>

<?php
//si erreur, afficher:
if(!empty($_SESSION["erreur"])){
  echo "<div class='erreur'><ul>";
  foreach ($_SESSION["erreur"] as $erreur) {
      echo "<li>$erreur</li>";
  }
  echo "</ul></div>";
  }
  unset($_SESSION["erreur"]);


//si sucess, l'afficher:
if(!empty($_SESSION["success"])){
  echo "<div class='success'<ul>";
  foreach ($_SESSION["success"] as $success) {
    echo "<li>$success</li>";
  }
  echo "</ul></div>";
  }
  unset($_SESSION["success"]);
?>


    <div class="form">

        <form enctype="multipart/form-data" action="projet_formulaire_reponse.php" method="post">

            <input type="hidden" name="id_projet" value="<?php echoKey($projetAModifier, "id_projet", "pas_de_id")  ?>">

            <div class="field">
                Titre du projet : <input name="titre_projet" placeholder="Titre du projet" type="text" value="<?php echoKey($projetAModifier, "titre_projet")  ?>">
            </div>

            <div class="field">
                Texte de présentation : <textarea name="texte" rows="8" cols="60" placeholder="Texte" type="text"><?php echoKey($projetAModifier, "texte")?></textarea>

            </div>

            <div class="field">
                Année de réalisation : <input name="annee_realisation" placeholder="Année" type="number" value="<?php echoKey($projetAModifier, "annee_realisation")?>">
            </div>

            <div class="field">
                Ordre : <input name="ordre" placeholder="Ordre" type="number"  value="<?php echoKey($projetAModifier, "ordre",0)?>">
                <?php //important de mettre une valeur par defaut à ordre sinon si l'utilisateur ne remplit pas ça bug!!! ça n'enregistre pas sur la base de donnees ou mettre dans bdd valeur par defaut. ?>
            </div>

<!-- LES TECHNOLIGIES à sélectionner. la recherche de la table se trouve en haut de la page -->

                <?php
                foreach ($technoACocher as $key => $nomTechno){
                  echo"$nomTechno[nom_techno]";
                  echo "<input type='checkbox' name='technologie[]' value='$nomTechno[id_techno]'
                  > ";
                }
                ?>


<!-- FAIRE PARTIE IMAGESSSSSSSSSSSSSSSSSSSSS -->

<input type="hidden" name="MAX_FILE_SIZE" value="5000000" />


<!-- ci-dessous pour afficher l'image qui est déjà sur le site. -->
  <div class="image_admin">
    <?php

    if(!empty($_GET["projetAAfficher"])) {
        if(is_file(CV_PATH_SITE . "/image/projet/$projetAModifier[titre_projet]" . "1.jpg")) {
          echo "<img src='" . CV_URL_SITE . "/image/projet/$projetAModifier[titre_projet]" . "1.jpg'class= 'mini_image'>";
        }
        if(is_file(CV_PATH_SITE . "/image/projet/$projetAModifier[titre_projet]" . "2.jpg")) {
          echo "<img src='" . CV_URL_SITE . "/image/projet/$projetAModifier[titre_projet]" . "2.jpg' class= 'mini_image'>";
        }
      }
      ?>
  </div>
<!-- ci-dessous pour importer les images -->

  Image 1 <input name="imageProjet[]" type="file"  accept="image/jpeg/png" /> <br>
  Image 2 <input name="imageProjet[]" type="file"  accept="image/jpeg/png" />

<!-- PARTIE VALIDATION BUTTON -->
      <div class="field">
            <input type="submit" value="Envoyer" />
            <a href="<?php echo CV_URL_SITE ?>admin/accueil.php" class="button">Annuler</a>
      </div>

  </form>
</div>

<?php

include "../include/footer.php";
