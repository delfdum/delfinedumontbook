<?php
include "config.php";
include PATH_TEMPLATE . "include/head.php"; ?>

<main>
  <h1> Me contacter</h1>
    <div class="contenair_contact">
      <h2> par mail: <?php echo MontrerContenu('MAIL')?></h2> <br>
      <h2> par téléphone: <?php echo MontrerContenu('TELEPHONE')?></h2><br>
      <h2>
        <a href="<?php echo MontrerContenu('LINKEDIN')?>" target="_blank"><img class="logoContact" src="https://img.icons8.com/fluent/48/000000/linkedin.png"/></a>
      </h2>
  </div>
</main>

<?php include PATH_TEMPLATE . "include/footer.php"; ?>
