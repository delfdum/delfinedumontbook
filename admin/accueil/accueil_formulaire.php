<?php
include '../../config.php';
include '../include/entete.php';

proteger_page(); // fonction qui permet de verifier si nous nous sommes préalablement connecté.
 ?>
 <h1>Modification de la page d'accueil</h1>

<?php
show_error();
show_success();
?>

<div class="form">

      <form enctype="multipart/form-data" action="accueil_formulaire_reponse.php" method="post">
        <div class="field">
<!-- PARTIE INSERT TITRE ET TEXTE -->
            <input type="text" name="titre" value="<?php echo  MontrerContenu("TITRE_ACCUEIL")?>" placeholder="Titre de la page" />
        </div>

            <textarea name="texteAccueil"><?php echo  MontrerContenu("TEXTE_ACCUEIL")?></textarea>


<!-- PARTIE INSERT IMAGE -->

      <!--MAX_FILE_SIZE doit précéder le champ input de type file. Il dit la taille maximum du fichier que l'on peut envoyer
      Ce champ n'est pas obligatoire.
       -->
          <input type="hidden" name="MAX_FILE_SIZE" value="5000000" />

          <div class="image_admin">
<!-- ci-dessous pour afficher l'image qui est déjà sur le site. Pas mis la condition si pas d'image sur le site cf site resto Nicolas -->
              <div class="image_admin">
                <?php //echo html_image("image/accueil/accueil.jpg", "mini_image");?>
              <?php echo "<img src='" . CV_URL_SITE . "/image/accueil/accueil.jpg' class= 'mini_image'>";?>
              </div>

            Image de la page d'accueil (image en .jpeg ou .png et qui ne dépasse pas 5Mo) : <br>
              <input name="imageAccueil" type="file"  accept="image/jpeg/png" /> <br>

          <div class="field">
            <input type="submit" value="Envoyer" />

            <a href="<?php echo CV_URL_SITE ?>admin/accueil.php" class="button">Annuler</a>
         </div>

      </form>
    </div>

<?php

include "../include/footer.php";
