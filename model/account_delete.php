<?php
require_once('../model/connexion.php');

function getCustomerIdentifier($accountId)
{
    $database = dbConnect();
    $sqlQuery = 'SELECT identifier FROM customers
                WHERE id = :id';
    $customerIdentifierStatement = $database->prepare($sqlQuery);
    $customerIdentifierStatement->bindValue(':id', $accountId, PDO::PARAM_INT);
    $customerIdentifierStatement->execute();
    $cstmIdentifier = $customerIdentifierStatement->fetchAll();
    $customerIdentifier = $cstmIdentifier[0]['identifier'];
    return $customerIdentifier;
}

function deleteAccount($accountId, $customerIdentifier)
{
    $checkCarts = deleteCarts($customerIdentifier);
    $checkCartsCustomers = deleteCartsCustomers($accountId);

    if($checkCarts && $checkCartsCustomers) {
        $database = dbConnect();
        $sqlQuery = 'DELETE FROM customers
                    WHERE id = :id';
        $stmt = $database->prepare($sqlQuery);
        $stmt->bindValue(':id', $accountId, PDO::PARAM_INT);
        $stmt->execute();
        session_destroy();
        $msg = 'Votre compte a bien été supprimé';
        return $msg;
    }
}

function deleteCarts($customerIdentifier)
{
    $database = dbConnect();
    $sqlQuery = 'DELETE FROM carts
                WHERE identifier_customer = :identifier_customer';
    $stmt = $database->prepare($sqlQuery);
    $stmt->bindValue(':identifier_customer', $customerIdentifier, PDO::PARAM_INT);
    $checkCarts = $stmt->execute();
    return $checkCarts;
}

function deleteCartsCustomers($accountId)
{
    $database = dbConnect();
    $sqlQuery = 'DELETE FROM carts_customers
                WHERE id_customer = :id_customer';
    $stmt = $database->prepare($sqlQuery);
    $stmt->bindValue(':id_customer', $accountId, PDO::PARAM_INT);
    $checkCartsCustomers = $stmt->execute();
    return $checkCartsCustomers;
}