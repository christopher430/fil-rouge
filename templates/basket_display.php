<?php ob_start(); ?>

<div class="container mt-5">
    <form action="" method="POST">
        <h1>Votre panier</h1>
        <?php if(empty($carts)) { ?>
            <h2 class="mt-3 opacity-25">Votre panier est vide</h2>
            <div class="row mt-4">
                <div class="">
                    <a href="index.php" class="btn btn-success">< Retour à vos achats</a>
                </div>
            </div>

        <?php } else { ?>
        <div class="row bg-success text-white my-3">
            <div class="col-lg-6 text-center fw-bold">
                PRODUIT(S)
            </div>
            <div class="col-lg-2 text-center fw-bold">
                PRIX
            </div>
            <div class="col-lg-2 text-center fw-bold">
                QUANTITÉ
            </div>
            <div class="col-lg-2 text-center fw-bold">
                TOTAL
            </div>
        </div>
        <?php
        $totalOrder = 0;
        foreach ($carts as $i => $cart) { 
            $rowTotal = $cart['product_row_total'] * $cart['product_quantity'];
            $totalOrder += $rowTotal;
        ?>
        <div class="row" style="height: 50px;">
            <div class="col-lg-6">
                <div class="row">
                    <div class="col-lg-1">
                        <img class="img-fluid" src="../admin/<?= $cart['picture_path'] ?>" alt="<?= $cart['product_name'] ?>">
                    </div>
                    <div class="col-lg d-flex flex-column justify-content-center">
                        <div>
                            <a href=""><strong><?= $cart['product_name'] ?></strong></a>
                        </div>
                        <div>
                            <span><?= $cart['platform_name'] ?></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 d-flex justify-content-center align-items-center">
                <input class="form-control w-50 text-center" name="price" type="number" value="<?= $cart['product_price'] ?>" disabled>
            </div>
            <div class="col-lg-2 d-flex justify-content-center align-items-center">
                <input class="form-control w-50 text-center" name="quantity" type="number" value="<?= $cart['product_quantity'] ?>" min="1" onchange="updateTableCart(this.value, <?= $cart['carts_id'] ?>, <?= $cart['product_price'] ?>)">
                <a href="index.php?action=cartRowDelete&cartId=<?= $cart['carts_id'] ?>" class="btn btn-danger ms-1">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                        <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/>
                    </svg>
                    <title>Supprimer</title>
                </a>
            </div>
            <div class="col-lg-2 d-flex justify-content-center align-items-center">
                <input type="number" class="form-control w-50 text-center" name="totalRow" id="rowTotal_<?= $i ?>"  value="<?= $cart['product_row_total'] ?>" readonly>
            </div>
        </div>
        <hr>
        <?php } ?>
        <div class="row">
            <div class="col-lg-6">
            <div class="form-floating">
                <textarea class="form-control" name="comment" style="height: 100px"></textarea>
                <label for="floatingTextarea2">Commentaires</label>
            </div>
            </div>
            <div class="col-lg-6">
                <div class="row">
                    <div class="col-lg-4"></div>
                    <div class="col-lg-4 d-flex justify-content-center align-items-center bg-success text-white fw-bold fs-4">
                        TOTAL
                    </div>
                    <div class="col-lg-4 d-flex justify-content-center align-items-center bg-success text-white fw-bold fs-4" id="totalOrder"></div>
                    <input id="identifierCustomer" value="<?php if(isset($_SESSION['customer'])) { echo $_SESSION['customer']; } else { echo $_SESSION['user']; } ?>" type="number" hidden>
                </div>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-lg-6">
                <div class="col-lg-4 d-flex justify-content-center">
                    <a href="index.php" class="btn btn-success">< Continuer vos achats</a>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="row">
                    <div class="col-lg-4"></div>
                    <div class="col-lg-4"></div>
                    <div class="col-lg-4 d-flex justify-content-center">
                        <?php if(isset($_SESSION['email'])) { ?>
                        <button  type="submit" name="submit" class="btn btn-primary">Valider votre panier ></button>
                        <?php } else { ?>
                        <a href="index.php?action=login&userIdentifier=<?= $_SESSION['user'] ?>" class="btn btn-primary">Valider votre panier ></a>
                        <?php } ?> 
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>
    </form>
</div>


<script src="../assets/script/carts.js"></script>

<?php $content = ob_get_clean(); ?>

<?php require('layout.php') ?>