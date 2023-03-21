<?php ob_start(); ?>
<div class="container" style="margin-top: 10px">
	<h1>Modifier un produit</h1>
	<?= $msg ?>
	<h3 class='text-warning'><?= $warning ?></h3>

	<form action="" method="POST" class="row my-5" enctype="multipart/form-data">
        <?php
            foreach ($products as $product) {
        ?>
		<div class="mb-3">
			<label for="name" class="form-label">Nom</label>
			<input id="name" type="text" class="form-control" placeholder="" name="name" value="<?= $product['name'] ?>">
		</div>
		<div class="mb-3">
            <label for="description">Description</label>
            <textarea class="form-control" id="" name="description" rows="3"><?= $product['description'] ?></textarea>
        </div>
        <div class="mb-3">
            <label for="fstFeature">Caractéristique 1</label>
            <input id="fstFeature" type="text" class="form-control" placeholder="" name="fstFeature" value="<?= $product['features_1'] ?>">
        </div>
        <div class="mb-3">
            <label for="scdFeature">Caractéristique 2</label>
			<input id="scdFeature" type="text" class="form-control" placeholder="" name="scdFeature" value="<?= $product['features_2'] ?>">
        </div>
        <div class="mb-3">
            <label for="isEnabled"><strong>Autoriser le produit</strong></label>
            <input class="form-check-input" type="checkbox" value="true" name="isEnabled" id="isEnabled" <?php if($product['is_enabled'] == 1) {echo 'checked';} ?>>
        </div>
		<div class="mt-3">
			<select name="categorie" id="categorie">
				<option value="0">Choisissez une catégorie</option>
				<?php
				foreach ($categories as $category) { ?>
				<option value="<?=$category['id']?>"><?=$category['name']?></option>
				<?php
				}
				?>
			</select>
		</div>
		<div class="my-3">
			<select name="subCategorie" id="subCategorie">
				<option value="0"><?= $displayNameSubCategorie ?></option>
			</select>
		</div>
		<div class="row my-3">
			<div class="">
            	<label><strong>Platforme</strong></label>
			</div>
		</div>
		<div class="row">
			<?php foreach($platforms as $platform) { ?>
			<div class="col">
				<label for="platforms[]"><?= $platform['name'] ?></label>
				<input class="form-check-input" type="checkbox" value="<?= $platform['id'] ?>" name="platforms[]" id="<?= $platform['id'] ?>"<?php if(in_array($platform['name'], $product)) { echo 'checked';} ?>>
			</div>
			<?php } ?>
        </div>
		<div class="row my-3">
			<div class="col">
            	<label><strong>Edition</strong></label>
			</div>
		</div>
		<div class="row">
			<?php foreach($editions as $edition) { ?>
			<div class="col-1">
				<label for="editions[]"><?= $edition['name'] ?></label>
				<input class="form-check-input" type="checkbox" value="<?= $edition['id'] ?>" name="editions[]" id="<?= $edition['id'] ?>" <?php if(in_array($edition['name'], $product)) { echo 'checked';} ?>>
			</div>
			<?php } ?>
		</div>
		<div class="mb-3 mt-3">
            <label for="picture" class="form-label"><strong>Ajouter une photo</strong></label>
            <input class="form-control" type="file" name="picture" title="JPG, JPEG, GIF ou PNG < 1Mo">
            <h5 class='text-warning mt-1'><?= $msgPictures ?></h5>
        </div>
        <div class="mb-3">
            <label for="pictureName" class="form-label">Nom de la photo</label>
            <input type="text" class="form-control" placeholder="" name="pictureName" value="<?= $firstPictureName ?>">
		</div>
		<div class="mt-3 col-3">
			<button type="submit" class="btn btn-primary" name="submit">Valider</button>
		</div>
		<div class="mt-3 col-3">
            <a href="index.php?action=products" role="button" class="btn btn-warning text-white">Retour</a>
		</div>
        <?php
        }
        ?>
	</form>
</div>

<script src="../assets/script/dynamicSelectCatScat.js"></script>

<?php $content = ob_get_clean(); ?>

<?php require('layout.php') ?>