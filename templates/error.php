<?php ob_start(); ?>

<div class="text-center my-5">
    <h1> Cette page n'existe pas LOSER !</h1>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('layout.php') ?>