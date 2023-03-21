<div class="container mt-3">
    <h1>Ajouter des photos</h1>
    <h3 class='text-success'><?= $msg ?></h3>

    <form action="" method="POST" class="row my-5" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="name" class="form-label">Nom</label>
            <input type="text" class="form-control" placeholder="" name="name" value="">
        </div>
        <div class="mb-3">
            <label for="picture" class="form-label">Ajouter des photos</label>
            <input class="form-control" name="picture[]" type="file" id="formFileMultiple" title="JPG, JPEG, GIF ou PNG < 1Mo" multiple onchange="onSelect(this)">
            <h5 class='text-warning mt-1'><?= $msgPictures ?></h5>
        </div>        
        <div class="mb-3 col-3">
            <button onclick="onSelect()" type="submit" class="btn btn-primary" name="submit">Valider</button>
        </div>
        <div class="mb-3 col-3">
            <a href="index.php?action=sections" role="button" class="btn btn-warning text-white">Retour</a>
        </div>
    </form>
</div>

<script src="../assets/script/picturesAlert.js"></script>

<?php $content = ob_get_clean(); ?>

<?php require('layout.php') ?>