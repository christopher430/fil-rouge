<?php ob_start(); ?>
<div class="container">
	<h1>Ajouter du texte</h1>
	<?= $msg ?>

	<form action="" method="POST" class="row my-5">
		<div class="mb-3">
			<label for="title" class="form-label">Titre</label>
			<input id="title" type="text" class="form-control" placeholder="" name="title" value="">
		</div>
		<div class="mb-3">
            <label for="paragraph_one">Paragraphe 1</label>
            <textarea class="form-control" id="" name="paragraph_one" rows="3"></textarea>
        </div>
        <div class="mb-3">
            <label for="paragraph_two">Paragraphe 2</label>
            <textarea class="form-control" id="" name="paragraph_two" rows="3"></textarea>
        </div>
		<div class="mb-3">
            <label for="paragraph_three">Paragraphe 3</label>
            <textarea class="form-control" id="" name="paragraph_three" rows="3"></textarea>
        </div>
		<div class="mb-3">
            <label for="paragraph_four">Paragraphe 4</label>
            <textarea class="form-control" id="" name="paragraph_four" rows="3"></textarea>
        </div>
		<div class="mt-3 col-3">
            <a href="index.php?action=sections" role="button" class="btn btn-warning text-white">Retour</a>
		</div>
		<div class="mt-3 col-3">
			<button type="submit" class="btn btn-primary" name="submit">Valider</button>
		</div>
	</form>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('layout.php') ?>