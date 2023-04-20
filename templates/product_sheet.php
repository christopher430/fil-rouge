<?php ob_start(); ?>

<?php foreach($products as $product) { ?>
<div class="container mt-5">
    <h2><?= $product['name'] ?></h2>
    <hr>
    <div class="row mt-5">
        <div class="col-lg-8">
            <div class="row" style="height: 300px;">
                <div class="col-lg-4">
                    <img class="img-fluid h-75" src="../admin/<?= $product['path'] ?>" alt="<?= $product['name'] ?>">
                </div>
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-lg">
                            <p>Plateforme : <strong><?= $product['platform_name'] ?></strong></p>
                        </div>
                        <div class="col-lg">
                            <p>Genre : <strong><?= $product['sub_cat_name'] ?></strong></p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <strong>Description</strong>
                        <p class="mt-2"><?= $product['description'] ?></p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <a href="index.php" class="btn btn-dark w-100">< Retour</a>
                </div>
            </div>
        </div>
        <div class="col-lg-4 text-center">
            <div class="row" style="height: 300px;">
                <div class="col-lg bg-light">
                    <div class="row">
                        <h6 class="text-white bg-success">Occasion reconditionné</h6>
                    </div>
                    <div class="row mt-5">
                        <h2 class="text-success"><?= str_replace('.', ',', $product['price']) ?> €</h2>
                    </div>
                    <div class="row mt-5">
                        <a href="index.php?action=basketAdd&identifierUser=<?php if(isset($_SESSION['customer'])) { echo $_SESSION['customer']; } else { echo $_SESSION['user']; } ?>&identifierProduct=<?= $product['identifier'] ?>&price=<?= $product['price'] ?>" class="btn btn-success text-white w-75 mx-auto mt-5">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart4" viewBox="0 0 16 16">
                                <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l.5 2H5V5H3.14zM6 5v2h2V5H6zm3 0v2h2V5H9zm3 0v2h1.36l.5-2H12zm1.11 3H12v2h.61l.5-2zM11 8H9v2h2V8zM8 8H6v2h2V8zM5 8H3.89l.5 2H5V8zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z"/>
                            </svg>
                            Ajouter au panier
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php } ?>

<?php $content = ob_get_clean(); ?>

<?php require('layout.php') ?>