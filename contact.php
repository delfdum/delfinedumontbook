<?php
include "config.php";
include PATH_TEMPLATE . "include/head.php"; ?>

<main>
<h1> Me contacter</h1>

<h2> par mail: <?php echo MontrerContenu('MAIL')?></h2>
<h2> par téléphone: <?php echo MontrerContenu('TELEPHONE')?></h2>
<h2><div class="">
<a href="<?php echo MontrerContenu('LINKEDIN')?>" target="_blank"><img src="https://img.icons8.com/fluent/48/000000/linkedin.png"/></a>

</div></h2>
</main>

<?php include PATH_TEMPLATE . "include/footer.php"; ?>
