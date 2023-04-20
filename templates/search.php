<?php ob_start(); ?>

<div class="row">
    <h4 class="ms-lg-5 text-lg-start text-sm-center mb-3 border-3 border-start border-success mt-5">Nombre de produit(s) : <span class="text-success"><?= count($products) ?></span></h4>
    <?php foreach($products as $product) { ?>
    <div class="col-lg-1 col-sm-6 ms-lg-5 mt-3">
        <a href="index.php?action=productSheet&idProduct=<?= $product['id'] ?>&idPlatform=<?= $product['platform_id'] ?>">
            <div class="row">
                <div class="d-flex">
                    <span class="bg-primary text-white px-1 text_sm"><?= $product['platform_name'] ?></span><span class="bg-light px-1 text_sm"><?= $product['name'] ?></span>
                </div>
            </div>
            <div class="row mt-1">
                <img src="../admin/<?= $product['path'] ?>" alt="<?= $product['name'] ?>">
            </div>
            <div class="row mt-1">
                <div class="d-flex align-items-center justify-content-center">
                    <span><strong><?= str_replace('.', ',', $product['price']) ?> €</strong></span>
                </div>
            </div>
        </a>
    </div>
    <?php } ?>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('layout.php') ?>