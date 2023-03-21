<?php ob_start(); ?>

<h1 class="ms-5"><?= $welcome ?></h1>
<a href="http://localhost/mysql/filrouge_front/public/index.php" target="blank" class="btn btn-primary ms-5 mt-3">Accéder au site marchand</a>

<?php $content = ob_get_clean(); ?>

<?php require('layout.php') ?>