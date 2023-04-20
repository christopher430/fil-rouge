<?php ob_start(); ?>

<h1 class="mt-5 ms-3">Mon compte</h1>
<?= $msgAccount ?>
<ul class="nav nav-tabs mt-5" id="myTab" role="tablist">
    <li class="nav-item" role="presentation">
        <button class="nav-link active" id="order-tab" data-bs-toggle="tab" data-bs-target="#order-tab-pane" type="button" role="tab" aria-controls="order-tab-pane" aria-selected="true">
            Mes commandes validées
        </button>
    </li>
    <li class="nav-item" role="presentation">
        <button class="nav-link" id="orderHistory-tab" data-bs-toggle="tab" data-bs-target="#orderHistory-tab-pane" type="button" role="tab" aria-controls="orderHistory-tab-pane" aria-selected="false">
            Modifier mes informations
        </button>
    </li>
</ul>
<div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="order-tab-pane" role="tabpanel" aria-labelledby="order-tab" tabindex="0">
        <?php if(!empty($allOrdersHistory)) { ?>
        <div class="container-fluid mt-5">
            <div class="row w-25">
                <form action="" method="POST" id="orderForm">
                    <input type="text" id="identifierCustomer" value="<?= $_SESSION['customer'] ?>" hidden>
                    <select class="form-select" name="selectOrder" id="selectOrder">
                        <option value="choice">Choisissez une commande</option>
                        <?php foreach($allOrdersHistory as $allOrderHistory) { ?>
                        <option value="<?= $allOrderHistory['identifier'] ?>"><?= 'N° ' . $allOrderHistory['identifier'] ?></option>
                        <?php } ?>
                    </select>
                </form>
            </div>
            <div class="row mt-2">
                <table class="table align-middle w-100">
                    <thead></thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
        <?php } else { ?>
        <h3 class="opacity-25 mt-3 ms-3">Vous n'avez aucune commande validée</h3>
        <?php } ?>
    </div>
    <div class="tab-pane fade" id="orderHistory-tab-pane" role="tabpanel" aria-labelledby="orderHistory-tab" tabindex="0">
    <div class="container d-flex justify-content-center mt-4">
        <div class="row w-75 mt-5">
            <div class="col-lg">
                <form action="" method="POST" class="border border-dark-subtle rounded-2 py-2 px-2">
                    <?php foreach($accounts as $account) { ?>
                    <div class="mb-3">
                        <label for="name" class="form-label">Nom</label>
                        <input type="text" class="form-control" placeholder="" name="name" value="<?= $account['name'] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="forname" class="form-label">Prénom</label>
                        <input type="text" class="form-control" placeholder="" name="forname" value="<?= $account['forname'] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="adress" class="form-label">Adresse de facturation</label>
                        <input type="text" class="form-control" placeholder="" name="billing_adress" value="<?= $account['billing_adress'] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="adress" class="form-label">Adresse de livraison</label>
                        <input type="text" class="form-control" placeholder="" name="delivery_adress" value="<?= $account['delivery_adress'] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" placeholder="" name="email" value="<?= $account['email'] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Mot de passe</label>
                        <input id="passAccount" type="password" class="form-control" placeholder="" name="password" value="<?= $account['password'] ?>" oninput="compare()">
                    </div>
                    <?php } ?>
                    <div class="mb-3">
                        <label for="check" class="form-label">Vérification</label>
                        <input id="checkAccount" type="password" class="form-control" placeholder="" name="check" value="<?= $account['password'] ?>" oninput="compare()">
                    </div>
                    <div class="mb-3" id="lockAccount">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-lock" viewBox="0 0 16 16" onclick="showAccount()">
                            <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2zM5 8h6a1 1 0 0 1 1 1v5a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V9a1 1 0 0 1 1-1z"/>
                        </svg><label for="">Afficher mot de passe</label>
                    </div>
                    <div class="row">
                        <div class="col-4 d-flex justify-content-center align-items-center">
                            <a href="index.php" class="btn btn-dark w-100">< Retour</a>
                        </div>
                        <div class="col-4 d-flex justify-content-center align-items-center">
                            <button type="submit" class="btn btn-primary w-100" name="submit">Modifier</button>
                        </div>
                        <div class="col-4 d-flex justify-content-center align-items-center">
                            <a href="index.php?action=accountDelete&accountId=<?= $account['id'] ?>" class="btn btn-danger w-100" onclick="return(confirm('Voulez-vous supprimer votre compte ?'));">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                    <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/>
                                </svg>
                                Supprimer le compte
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="../assets/script/connection.js"></script>
<script src="../assets/script/account.js"></script>
<script src="../assets/script/dynamicSelectOrderHistory.js"></script>

<?php $content = ob_get_clean(); ?>

<?php require('layout.php') ?>