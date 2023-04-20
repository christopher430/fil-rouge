<?php

require_once('connexion.php');

if(isset($_GET['quantity']) && isset($_GET['cartId']) && isset($_GET['rowTotal'])) {
    $cartId = intval($_GET['cartId']);
    $quantity = intval($_GET['quantity']);
    $rowTotal = floatval($_GET['rowTotal']);

    $database = dbConnect();
    $stmt = $database->prepare('UPDATE carts SET quantity = :quantity, row_total = :row_total WHERE id = :id');
    $stmt->bindValue(':id', $cartId, PDO::PARAM_INT);
    $stmt->bindValue(':quantity', $quantity, PDO::PARAM_INT);
    $stmt->bindValue(':row_total', $rowTotal);
    $stmt->execute();
} else {
    echo 'missing parameter';
}