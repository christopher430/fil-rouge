<?php ob_start(); ?>

<?php if(!empty($orders)) { ?>
<div class="container mt-5">
<?= $msg ?>
    <div class="row">
        <table class="table align-middle w-100">
            <thead>
                <tr>
                    <th>
                        PRODUIT(S)
                    </th>
                    <th class=" text-center">
                        PRIX
                    </th>
                    <th class=" text-center">
                        QUANTITÉ
                    </th>
                    <th class=" text-center">
                        TOTAL
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($orders as $order) { ?>
                <tr>
                    <td>
                        <img class="img-fluid" src="../admin/<?= $order['path'] ?>" alt="<?= $order['name'] ?>" style="height: 30px;">
                        <strong><?= $order['products_name'] ?></strong>
                    </td>
                    <td class="text-center">
                        <?= $order['carts_price'] ?>
                    </td>
                    <td class="text-center">
                        <?= $order['carts_quantity'] ?>
                    </td>
                    <td class="text-center">
                        <?= $order['carts_row_total'] ?>
                    </td>
                </tr>
                <?php } ?>
                <tr>
                    <td colspan="2" class=""></td>
                    <th class="text-center fs-5">TOTAL</th>
                    <td class="text-center fs-5"><strong><?= $totalPrice['total_price'] ?></strong></td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="row">
        <div class="col-lg-4"></div>
        <div class="col-lg-4"></div>
        <div class="col-lg-4 text-end">
            <form action="" method="POST">
                <button type="submit" name="sendEmail" class="btn btn-success">Recevoir le devis par Email</button>
            </form>
        </div>
    </div>
</div>
<?php } else { ?>
<h3 class="opacity-25 mt-5 ms-3">Vous n'avez pas de commande en cours de validation</h3>
<?php } ?>

<?php $content = ob_get_clean(); ?>

<?php require('layout.php') ?>