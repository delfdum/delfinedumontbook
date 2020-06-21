<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title> <?php echo NOM_DU_TITLE; echo " - ";
    echo $projet_a_afficher["titre_projet"];
    ?> </title>
    <link href="https://fonts.googleapis.com/css2?family=Caveat&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo URL_TEMPLATE ?>/css/mes_styles.css">
  </head>

  <body>
    <header>
      <div class="contenairPrincipal">
        <div class="titre_nom">
          <h1><?php echo NOM_DU_TITLE ?></h1>
          <h2>webmaster</h2>
        </div>
        <div class="navigation">
          <?php include "navigation.php" ?>
        </div>
      </div>
    </header>
    <main>
