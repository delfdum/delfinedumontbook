<?php //Sur cette page, l'utilisateur va pouvoir changer ses coordonnées perso ?>

<?php
include '../../config.php';
include '../include/entete.php';

proteger_page(); // fonction qui permet de verifier si nous nous sommes préalablement connecté.
 ?>
 <h1>Modification de mes coordonnées</h1>

<?php
show_error();
show_success();
?>

<div class="form">

      <form enctype="multipart/form-data" action="contact_formulaire_reponse.php" method="post">

        <div class="field">
            Mon e-mail: <input type="text" name="mail" value="<?php echo  MontrerContenu("MAIL")?>" placeholder="email" />
        </div>

        <div class="field">
            Mon téléphone: <input type="text" name="telephone" value="<?php echo  MontrerContenu("TELEPHONE")?>" placeholder="téléphone" />
        </div>

        <div class="field">
            Mon LinkedIn: <input type="text" name="linkedin" value="<?php echo  MontrerContenu("LINKEDIN")?>" placeholder="url_linkedin" />
        </div>


          <div class="field">
            <input type="submit" value="Envoyer" />

            <a href="<?php echo CV_URL_SITE ?>admin/accueil.php" class="button">Annuler</a>
          </div>
        </form>

</div>

<?php

include "../include/footer.php";
