<div class="container mt-3">
    <h1>Modifier une édition</h1>
    <h3 class='text-success'><?= $msg ?></h3>

    <form action="" method="POST" class="row my-5" enctype="multipart/form-data">
        <?php
            foreach ($editions as $edition) {
        ?>
        <div class="mb-3">
            <label for="name" class="form-label">Nom</label>
            <input type="text" class="form-control" placeholder="" name="name" value="<?= $edition['name'] ?>">
        </div>
        <div class="mb-3 col-3">
            <button type="submit" class="btn btn-primary" name="submit">Valider</button>
        </div>
        <div class="mb-3 col-3">
            <a href="index.php?action=editions" role="button" class="btn btn-warning text-white">Retour</a>
        </div>
        <?php
        }
        ?>
    </form>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('layout.php') ?>