<?php ob_start(); ?>
<div class="container" style="margin-top: 10px">
	<h1>Modifier une catégorie</h1>
	<?= $msg ?>

	<form action="" method="POST" class="row my-5">
        <?php
            foreach ($categories as $category) {
        ?>
		<div class="mb-3">
			<label for="name" class="form-label">Nom</label>
			<input id="name" type="text" class="form-control" placeholder="" name="name" value="<?= $category['name'] ?>">
		</div>
		<div class="mb-3">
            <label for="description">Description</label>
            <textarea class="form-control" id="" name="description" rows="3"><?= $category['description'] ?></textarea>
        </div>
        <div class="mb-3">
            <label for="isEnabled"><strong>Autoriser le produit</strong></label>
            <input class="form-check-input" type="checkbox" value="true" name="isEnabled" id="isEnabled" <?php if($category['is_enabled'] == 1) {echo 'checked';} ?>>
        </div>
        <div class="mt-3 col-3">
			<button type="submit" class="btn btn-primary" name="submit">Valider</button>
		</div>
		<div class="mt-3 col-3">
            <a href="index.php?action=categories" role="button" class="btn btn-warning text-white">Retour</a>
		</div>
        <?php
        }
        ?>
	</form>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('layout.php') ?>