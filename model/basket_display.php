<?php
require_once('../model/connexion.php');

function getCustomerCarts($customer)
{
    $database = dbConnect();
    $sqlQuery = 'SELECT c.id AS carts_id, c.identifier_customer AS customer_identifier, c.price AS product_price, c.quantity AS product_quantity, c.row_total AS product_row_total, c.identifier AS carts_identifier, p.identifier AS product_identifier, p.name AS product_name, pic.path AS picture_path, plt.name AS platform_name, cus.name AS customer_name, cus.forname AS customer_forname, cus.email AS customer_email, cus.billing_adress AS customer_billing_adress, cus.delivery_adress AS customer_delivery_adress
                FROM carts c
                INNER JOIN customers cus
                ON c.identifier_customer = cus.identifier
                INNER JOIN products p
                ON c.identifier_product = p.identifier
                INNER JOIN pictures pic
                ON p.id_pictures = pic.id
                INNER JOIN products_platforms_editions ppe
                ON p.id = ppe.id_products
                INNER JOIN platforms plt
                ON ppe.id_platforms = plt.id
                WHERE c.identifier_customer = :customerIdentifier';
    $cartStatement = $database->prepare($sqlQuery);
    $cartStatement->bindValue(':customerIdentifier', $customer, PDO::PARAM_INT);
    $cartStatement->execute();
    $carts = $cartStatement->fetchAll(PDO::FETCH_ASSOC);
    return $carts;
}

function getUserCarts($user)
{
    $database = dbConnect();
    $sqlQuery = 'SELECT c.id AS carts_id, c.price AS product_price, c.quantity AS product_quantity, c.row_total AS product_row_total, c.identifier AS carts_identifier, p.identifier AS product_identifier, p.name AS product_name, pic.path AS picture_path, plt.name AS platform_name
                FROM carts c
                INNER JOIN products p
                ON c.identifier_product = p.identifier
                INNER JOIN pictures pic
                ON p.id_pictures = pic.id
                INNER JOIN products_platforms_editions ppe
                ON p.id = ppe.id_products
                INNER JOIN platforms plt
                ON ppe.id_platforms = plt.id
                WHERE c.identifier_customer = :customerIdentifier';
    $cartStatement = $database->prepare($sqlQuery);
    $cartStatement->bindValue(':customerIdentifier', $user, PDO::PARAM_INT);
    $cartStatement->execute();
    $carts = $cartStatement->fetchAll(PDO::FETCH_ASSOC);
    return $carts;
}

function verifyOrder($customer)
{
    $database = dbConnect();
    $sqlQuery = 'SELECT * FROM orders 
                WHERE customer_identifier = :customer_identifier
                AND sent = 0';
    $orderStatement = $database->prepare($sqlQuery);
    $orderStatement->bindValue(':customer_identifier', $customer, PDO::PARAM_INT);
    $orderStatement->execute();
    $order = $orderStatement->fetchAll(PDO::FETCH_ASSOC);
    return $order;
}

function deleteOrder($customer)
{
    $database = dbConnect();
    $sqlQuery = 'DELETE FROM orders
                WHERE customer_identifier = :customer_identifier
                AND sent = 0';
    $stmt = $database->prepare($sqlQuery);
    $stmt->bindValue(':customer_identifier', $customer, PDO::PARAM_INT);
    $stmt->execute();
}

function insertIntoOrders($identifier, $customerIdentifier,  $customerName, $customerForname, $customerEmail, $customerBillingAdress, $customerDeliveryAdress, $cartIdentifier, $cartPrice, $cartQuantity, $cartRowTotal, $productIdentifier, $productName, $comment)
{
    $database = dbConnect();
    $sqlQuery = 'INSERT INTO orders(identifier, customer_identifier, customers_name, customers_forname, customers_email, billing_adress, delivery_adress, carts_identifier, carts_price, carts_quantity, carts_row_total, products_identifier, products_name, comment, sent)
                VALUES (:identifier, :customer_identifier, :customers_name, :customers_forname, :customers_email, :billing_adress, :delivery_adress, :carts_identifier, :carts_price, :carts_quantity, :carts_row_total, :products_identifier, :products_name, :comment, 0)';
    $stmt = $database->prepare($sqlQuery);
    $stmt->bindValue(':identifier', $identifier, PDO::PARAM_INT);
    $stmt->bindValue(':customer_identifier', $customerIdentifier, PDO::PARAM_INT);
    $stmt->bindValue(':customers_name', $customerName, PDO::PARAM_STR);
    $stmt->bindValue(':customers_forname', $customerForname, PDO::PARAM_STR);
    $stmt->bindValue(':customers_email', $customerEmail, PDO::PARAM_STR);
    $stmt->bindValue(':billing_adress', $customerBillingAdress, PDO::PARAM_STR);
    $stmt->bindValue(':delivery_adress', $customerDeliveryAdress, PDO::PARAM_STR);
    $stmt->bindValue(':carts_identifier', $cartIdentifier, PDO::PARAM_INT);
    $stmt->bindValue(':carts_price', $cartPrice);
    $stmt->bindValue(':carts_quantity', $cartQuantity, PDO::PARAM_INT);
    $stmt->bindValue(':carts_row_total', $cartRowTotal);
    $stmt->bindValue(':products_identifier', $productIdentifier, PDO::PARAM_INT);
    $stmt->bindValue(':products_name', $productName, PDO::PARAM_STR);
    $stmt->bindValue(':comment', $comment, PDO::PARAM_STR);
    $stmt->execute();
}