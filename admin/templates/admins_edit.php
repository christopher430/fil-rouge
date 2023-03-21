<?php ob_start(); ?>

<div class="container mt-3">
    <h1>Modifier un administrateur</h1>
    <?= $msg ?>

    <form action="" method="POST" class="row my-5">
        <?php
            foreach ($admins as $admin) {
        ?>
        <div class="mb-3">
            <label for="name" class="form-label">Nom</label>
            <input type="text" class="form-control" placeholder="" name="name" value="<?= htmlspecialchars($admin['name']) ?>">
        </div>
        <div class="mb-3">
            <label for="forname" class="form-label">Prénom</label>
            <input type="text" class="form-control" placeholder="" name="forname" value="<?= htmlspecialchars($admin['forname']) ?>">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" placeholder="" name="email" value="<?= htmlspecialchars($admin['email']) ?>">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Mot de passe</label>
            <input id="pass" type="password" class="form-control" placeholder="" name="password" value="<?= htmlspecialchars($admin['password']) ?>" oninput="compare()">
        </div>
        <div class="mb-3">
            <label for="check" class="form-label">Vérification</label>
            <input id="check" type="password" class="form-control" placeholder="" name="check" value="" oninput="compare()">
        </div>
        <div class="mb-3" id="lock">
            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-lock" viewBox="0 0 16 16" onclick="show()">
                <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2zM5 8h6a1 1 0 0 1 1 1v5a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V9a1 1 0 0 1 1-1z"/>
            </svg><label for="">Afficher mot de passe</label>
        </div>
        <div class="mb-3 col-3">
            <button type="submit" class="btn btn-primary" name="submit">Valider</button>
        </div>
        <div class="mb-3 col-3">
            <a href="index.php?action=admins" role="button" class="btn btn-warning text-white">Retour</a>
        </div>
        <?php
        }
        ?>
    </form>
</div>

<script src="../assets/script/login.js"></script>

<?php $content = ob_get_clean(); ?>

<?php require('layout.php') ?>