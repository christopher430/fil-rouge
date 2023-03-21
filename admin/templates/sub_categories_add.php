<?php ob_start(); ?>
<div class="container">
	<h1>Ajouter une sous-catégorie</h1>
	<?= $msg ?>

	<form action="" method="POST" class="row my-5">
		<div class="mb-3">
			<label for="name" class="form-label">Nom</label>
			<input id="name" type="text" class="form-control" placeholder="" name="name" value="">
		</div>
		<div class="mb-3">
            <label for="description">Description</label>
            <textarea class="form-control" id="" name="description" rows="3"></textarea>
        </div>
        <div class="mb-3">
            <label for="isEnabled"><strong>Autoriser le produit</strong></label>
            <input class="form-check-input" type="checkbox" value="" name="isEnabled" id="isEnabled">
        </div>
        <div class="mt-3">
			<select name="cat" id="cat">
				<option value="">Choisissez une catégorie</option>
				<?php
				foreach ($categories as $category) { ?>
				<option value="<?=$category['name']?>"><?=$category['name']?></option>
				<?php
				}
				?>
			</select>
		</div>
		<div class="mt-3 col-3">
			<button type="submit" class="btn btn-primary" name="submit">Valider</button>
		</div>
		<div class="mt-3 col-3">
            <a href="index.php?action=sub_categories" role="button" class="btn btn-warning text-white">Retour</a>
		</div>
	</form>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('layout.php') ?>