<?php ob_start(); ?>

<div class="container w-25 d-flex flex-column align-items-center border border-dark border-3 rounded-4">
    <h3 class="text-success mt-3">Sous-catégorie supprimée</h3>

    <div class="my-3 col-3 text-center">
        <a href="index.php?action=sub_categories" role="button" class="btn btn-primary">Retour</a>
    </div>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('layout.php') ?>