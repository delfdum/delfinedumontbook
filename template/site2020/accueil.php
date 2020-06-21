<?php //Cette page est mon template accueil, la page principale quand on arrive sur le site, il a le titre, texte de presentation et image ?>

<?php include "include/head.php";?>

<div class="containerPrincipal">

          <h1><?php echo  MontrerContenu("TITRE_ACCUEIL")?></h1>

          <p><?php echo nl2br( MontrerContenu("TEXTE_ACCUEIL"))?></p>

          <?php echo html_image("image/accueil/accueil.jpg", "imageParProjet")?>

</div>


<?php include "include/footer.php" ?>
