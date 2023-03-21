<?php ob_start(); ?>

<div class="container">
    <h1>Lier à une mise en page</h1>
    <h3 class='text-success'><?= $msg ?></h3>

    <form action="" method="POST" class="row my-5">
        <table class="table table-bordered mx-auto my-3">
            <thead>
                <tr>
                    <th class="col-1 text-center">Choix</th>
                    <th class="">Description</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach($layouts as $layout) {
                ?>
                <tr>
                    <td>
                        <div class="form-check d-flex justify-content-center">
                            <input class="form-check-input" type="radio" name="choice" value="<?= $layout['id'] ?>" <?php if($_GET['id_layouts'] == $layout['id']) { echo 'checked'; } ?>>
                        </div>
                    </td>
                    <td><?= $layout['description'] ?></td>
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
        <div class="mb-3 col-3">
            <button type="submit" class="btn btn-primary" name="submit">Valider</button>
        </div>
        <div class="mb-3 col-3">
            <a href="index.php?action=sections" role="button" class="btn btn-warning text-white">Retour</a>
        </div>
    </form>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('layout.php') ?>

