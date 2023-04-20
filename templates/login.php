<?php ob_start(); ?>

<h1 class="mt-5 ms-3">Mon compte / identification</h1>
<?= $msgAccount ?><?= $msgLogin ?>
<div class="container-fluid mt-4">
    <div class="row">
        <div class="col-lg-6">
            <form class="border border-dark rounded-2 py-2 px-2" method="POST" action="">
                    <h1>Connectez-vous</h1>
                    <label for="email">Adresse Email</label>
                    <input type="email" placeholder="Entrez votre adresse Email" class="form-control" name="emailConnection">
                    <label for="password">Mot de passe</label>
                    <input id="passConnection" type="password" placeholder="Entrez votre mot de passe" class="form-control" name="passwordConnection">
                    <div class="mt-1" id="lockConnection" style="cursor: pointer;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-lock" viewBox="0 0 16 16" onclick="showConnection()">
                            <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2zM5 8h6a1 1 0 0 1 1 1v5a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V9a1 1 0 0 1 1-1z"/>
                        </svg>
                        <label for="">Afficher mot de passe</label>
                    </div>
                    <div class="mt-2 mb-2 text-center">
                        <button type="signout" class="btn btn-primary" name="connect">Se connecter</button>
                    </div>
            </form>
        </div>
        <div class="col-lg-6">
            <form action="" method="POST" class="border border-dark rounded-2 py-2 px-2">
                <h1>Créer un compte</h1>
                <div class="mb-3">
                    <label for="name" class="form-label">Nom</label>
                    <input type="text" class="form-control" placeholder="" name="nameAccount" value="">
                </div>
                <div class="mb-3">
                    <label for="forname" class="form-label">Prénom</label>
                    <input type="text" class="form-control" placeholder="" name="fornameAccount" value="">
                </div>
                <div class="mb-3">
                    <label for="adress" class="form-label">Adresse</label>
                    <input type="text" class="form-control" placeholder="" name="adressAccount" value="">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" placeholder="" name="emailAccount" value="">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Mot de passe</label>
                    <input id="passAccount" type="password" class="form-control" placeholder="" name="passwordAccount" value="" oninput="compare()">
                </div>
                <div class="mb-3">
                    <label for="check" class="form-label">Vérification</label>
                    <input id="checkAccount" type="password" class="form-control" placeholder="" name="checkAccount" value="" oninput="compare()">
                </div>
                <div class="mb-3" id="lockAccount" style="cursor: pointer;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-lock" viewBox="0 0 16 16" onclick="showAccount()">
                        <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2zM5 8h6a1 1 0 0 1 1 1v5a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V9a1 1 0 0 1 1-1z"/>
                    </svg>
                    <label for="">Afficher mot de passe</label>
                </div>
                <div class="row">
                    <div class="col-4"></div>
                    <div class="col-4 d-flex justify-content-center align-items-center">
                        <button type="submit" class="btn btn-primary w-100" name="submit">Valider</button>
                    </div>
                    <div class="col-4"></div>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="../assets/script/connection.js"></script>
<script src="../assets/script/account.js"></script>

<?php $content = ob_get_clean(); ?>

<?php require('layout.php') ?>