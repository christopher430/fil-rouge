<?php ob_start(); ?>

<h1 class="text-success mt-5 ms-3"><?= $msg ?></h1>
<a href="index.php" class="btn btn-dark ms-3">< Retourner à la page d'accueil</a>

<?php $content = ob_get_clean(); ?>

<?php require('layout.php') ?>