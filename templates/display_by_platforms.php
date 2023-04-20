            <?php ob_start(); ?>

            <div class="row">
                <h4 class="ms-lg-5 text-lg-start text-sm-center mb-3 border-3 border-start border-success mt-5">Meilleures ventes</h4>
                <?php if(!empty($products)) { foreach($products as $product) { ?>
                <div class="col-lg-1 col-sm-6 ms-lg-5">
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
                <?php }} ?>
            </div>
            <div class="row">
                <h4 class="ms-lg-5 text-lg-start text-sm-center mb-3 border-3 border-start border-success mt-5">Derniers arrivages</h4>
                <?php if(!empty($lastProducts)) { foreach($lastProducts as $lastProduct) { ?>
                <div class="col-lg-1 col-sm-6 ms-lg-5">
                    <a href="index.php?action=productSheet&idProduct=<?= $lastProduct['id'] ?>&idPlatform=<?= $lastProduct['platform_id'] ?>">
                        <div class="row">
                            <div class="d-flex">
                                <span class="bg-primary text-white px-1 text_sm"><?= $lastProduct['platform_name'] ?></span><span class="bg-light px-1 text_sm"><?= $lastProduct['name'] ?></span>
                            </div>
                        </div>
                        <div class="row mt-1">
                            <img src="../admin/<?= $lastProduct['path'] ?>" alt="<?= $lastProduct['name'] ?>">
                        </div>
                        <div class="row mt-1">
                            <div class="d-flex align-items-center justify-content-center">
                                <span><strong><?= str_replace('.', ',', $lastProduct['price']) ?> €</strong></span>
                            </div>
                        </div>
                    </a>
                </div>
                <?php }} ?>
            </div>
            <div class="row">
                <h4 class="ms-lg-5 text-lg-start text-sm-center mb-3 border-3 border-start border-success mt-5">Petits Prix</h4>
                <?php if(!empty($cheapProducts[0])) { foreach($cheapProducts as $cheapProduct) { ?>
                <div class="col-lg-1 col-sm-6 ms-lg-5">
                    <a href="index.php?action=productSheet&idProduct=<?= $cheapProduct['id'] ?>&idPlatform=<?= $cheapProduct['platform_id'] ?>">
                        <div class="row">
                            <div class="d-flex">
                                <span class="bg-primary text-white px-1 text_sm"><?= $product['platform_name'] ?></span><span class="bg-light px-1 text_sm"><?= $cheapProduct['name'] ?></span>
                            </div>
                        </div>
                        <div class="row mt-1">
                            <img src="../admin/<?= $cheapProduct['path'] ?>" alt="<?= $cheapProduct['name'] ?>">
                        </div>
                        <div class="row mt-1">
                            <div class="d-flex align-items-center justify-content-center">
                                <span><strong><?= str_replace('.', ',', $cheapProduct['price']) ?> €</strong></span>
                            </div>
                        </div>
                    </a>
                </div>
                <?php }} ?>
            </div>
        </div>
    </div>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('layout.php') ?>