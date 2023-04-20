<?php
require_once('../model/connexion.php');

function row_delete($cartId)
{
    $database = dbConnect();
    $sqlQuery = 'DELETE FROM carts_customers WHERE id_cart = :id_cart';
    $stmt = $database->prepare($sqlQuery);
    $stmt->bindValue(':id_cart', $cartId, PDO::PARAM_INT);
    $success = $stmt->execute();

    if($success) {
        $database = dbConnect();
        $sqlQuery = 'DELETE FROM carts WHERE id = :id';
        $stmt = $database->prepare($sqlQuery);
        $stmt->bindValue(':id', $cartId, PDO::PARAM_INT);
        $stmt->execute();
    }
}