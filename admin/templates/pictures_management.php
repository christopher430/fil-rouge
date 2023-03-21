<?php ob_start(); ?>

<div class="container">
    <h1>Gestion des photos</h1>
    <table class="table table-bordered mx-auto mt-3">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Photo</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach($pictures as $picture) {?>
            <tr>
                <td><?=$picture['name']?></td>
                <td class="text-center"><img src="../<?=$picture['path']?>" alt="<?=$picture['name']?>"></td>
            </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('layout.php') ?>