<?php ob_start(); ?>

<?= $e ?>

<?php $content = ob_get_clean(); ?>

<?php require('layout.php') ?>