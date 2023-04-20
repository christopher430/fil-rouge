<?php
require_once('../model/connexion.php');

function addToCarts($identifierUser, $identifierProduct, $price)
{
    $identifier = time();
    $quantity = 1;
    if(isset($_SESSION['customer'])) {
        $bound = 1;
    } else {
        $bound = 0;
    }

    $database = dbConnect();
    $sqlQuery = 'INSERT INTO carts(identifier, identifier_product, identifier_customer, price, quantity, row_total, bounded) 
                VALUES (:identifier, :identifier_product, :identifier_customer, :price, :quantity, :row_total, :bounded)'; 
    $stmt = $database->prepare($sqlQuery);
    $stmt ->bindValue(':identifier', $identifier, PDO::PARAM_INT);
    $stmt ->bindValue(':identifier_product', $identifierProduct, PDO::PARAM_INT);
    $stmt ->bindValue(':identifier_customer', $identifierUser, PDO::PARAM_INT);
    $stmt ->bindValue(':price', $price);
    $stmt ->bindValue(':quantity', $quantity, PDO::PARAM_INT);
    $stmt ->bindValue(':row_total', $price);
    $stmt ->bindValue(':bounded', $bound, PDO::PARAM_BOOL);
    $success = $stmt->execute();
    if($success) {
        addToCartsCustomers($identifierUser);
    }
}

function productControl($identifierUser)
{
    $database = dbConnect();
    $sqlQuery = 'SELECT identifier_product FROM carts WHERE identifier_customer = :identifier_customer'; 
    $productControlStatement = $database->prepare($sqlQuery);
    $productControlStatement ->bindValue(':identifier_customer', $identifierUser, PDO::PARAM_INT);
    $productControlStatement->execute();
    $productControl = $productControlStatement->fetch();
    return $productControl;
}

function updateCartQuantity($identifierProduct)
{
    $database = dbConnect();
    $sqlQuery = 'UPDATE carts SET quantity = quantity + 1 WHERE identifier_product = :identifier_product'; 
    $stmt = $database->prepare($sqlQuery);
    $stmt ->bindValue(':identifier_product', $identifierProduct, PDO::PARAM_INT);
    $test = $stmt->execute();
    return $test;
}

function addToCartsCustomers($identifierUser)
{
    $database = dbConnect();
    $sqlQuery = 'SELECT id FROM carts ORDER BY id DESC'; 
    $cartIdStatement = $database->prepare($sqlQuery);
    $cartIdStatement->execute();
    $cartId = $cartIdStatement->fetch();

    $database = dbConnect();
    $sqlQuery = 'SELECT id FROM customers WHERE identifier = :identifier'; 
    $customerIdStatement = $database->prepare($sqlQuery);
    $customerIdStatement ->bindValue(':identifier', $identifierUser, PDO::PARAM_INT);
    $customerIdStatement->execute();
    $customerId = $customerIdStatement->fetch();

    if(!empty($cartId)) {
        $database = dbConnect();
        $sqlQuery = 'INSERT INTO carts_customers(id_cart, id_customer) 
                    VALUES (:id_cart, :id_customer)'; 
        $stmt = $database->prepare($sqlQuery);
        $stmt ->bindValue(':id_cart', $cartId['id'], PDO::PARAM_INT);
        $stmt ->bindValue(':id_customer', $customerId['id'], PDO::PARAM_INT);
        $stmt->execute();    
    }
}