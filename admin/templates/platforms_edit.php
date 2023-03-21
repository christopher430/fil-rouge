<div class="container mt-3">
    <h1>Modifier une plateforme</h1>
    <h3 class='text-success'><?= $msg ?></h3>
    <h3 class='text-warning'><?= $warning ?></h3>

    <form action="" method="POST" class="row my-5" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="name" class="form-label">Nom de la plateforme</label>
            <input type="text" class="form-control" placeholder="" name="name" value="<?= $platforms[0]['name'] ?>">
        </div>
        <div class="mb-3">
            <label for="picture" class="form-label">Ajouter une photo</label>
            <input class="form-control" type="file" name="picture" title="JPG, JPEG, GIF ou PNG < 1Mo">
            <h5 class='text-warning mt-1'><?= $msgPictures ?></h5>
        </div>
        <div class="mb-3">
            <label for="pictureName" class="form-label">Nom de la photo</label>
            <input type="text" class="form-control" placeholder="" name="pictureName" value="<?= $firstPictureName ?>">
		</div>     
        <div class="mb-3 col-3">
            <button type="submit" class="btn btn-primary" name="submit">Valider</button>
        </div>
        <div class="mb-3 col-3">
            <a href="index.php?action=platforms" role="button" class="btn btn-warning text-white">Retour</a>
        </div>
    </form>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('layout.php') ?>