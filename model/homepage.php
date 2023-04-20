<?php
require_once('../model/connexion.php');

function deleteDifferentUserCarts($user)
{
    $success = '';

    $database = dbConnect();
    $sqlQuery = 'SELECT id FROM carts WHERE identifier_customer != :user
                AND bounded = 0';
    $cartIdStatement = $database->prepare($sqlQuery);
    $cartIdStatement->bindValue(':user', $user, PDO::PARAM_INT);
    $cartIdStatement->execute();
    $cartIds = $cartIdStatement->fetchAll();
    foreach($cartIds as $cartId) {
        $database = dbConnect();
        $sqlQuery = 'DELETE FROM carts_customers WHERE id = :id';
        $stmt = $database->prepare($sqlQuery);
        $stmt->bindValue(':id', $cartId[0]['id'], PDO::PARAM_INT);
        $success = $stmt->execute();
    }
    if($success) {
        $database = dbConnect();
        $sqlQuery = 'DELETE FROM carts WHERE identifier_customer != :user
                    AND bounded = 0';
        $stmt = $database->prepare($sqlQuery);
        $stmt->bindValue(':user', $user, PDO::PARAM_INT);
        $stmt->execute();
    }
}

function getHomeProducts()
{
    $database = dbConnect();
    $sqlQuery = 'SELECT p.id, p.name, p.description, p.features_1, p.features_2, p.price, pic.path, plt.id AS platform_id, plt.name AS platform_name
                FROM products p 
                INNER JOIN pictures pic 
                ON p.id_pictures = pic.id
                INNER JOIN products_platforms_editions ppe
                ON p.id = ppe.id_products
                INNER JOIN platforms plt
                ON plt.id = ppe.id_platforms
                WHERE id_platforms IS NOT NULL
                ORDER BY RAND()';
    $productStatement = $database->prepare($sqlQuery);
    $productStatement->execute();
    $products = $productStatement->fetchAll(PDO::FETCH_ASSOC);
    return $products;
}

function getHomeLastProducts()
{
    $database = dbConnect();
    $sqlQuery = 'SELECT p.id, p.name, p.description, p.features_1, p.features_2, p.price, pic.path, plt.id AS platform_id, plt.name AS platform_name
                FROM products p 
                INNER JOIN pictures pic 
                ON p.id_pictures = pic.id
                INNER JOIN products_platforms_editions ppe
                ON p.id = ppe.id_products
                INNER JOIN platforms plt
                ON plt.id = ppe.id_platforms
                WHERE id_platforms IS NOT NULL
                ORDER BY RAND()';
    $lastProductStatement = $database->prepare($sqlQuery);
    $lastProductStatement->execute();
    $lastProducts = $lastProductStatement->fetchAll(PDO::FETCH_ASSOC);
    return $lastProducts;
}

function getHomeCheapProducts()
{
    $database = dbConnect();
    $sqlQuery = 'SELECT p.id, p.name, p.description, p.features_1, p.features_2, p.price, pic.path, plt.id AS platform_id, plt.name AS platform_name
                FROM products p 
                INNER JOIN pictures pic 
                ON p.id_pictures = pic.id
                INNER JOIN products_platforms_editions ppe
                ON p.id = ppe.id_products
                INNER JOIN platforms plt
                ON plt.id = ppe.id_platforms
                WHERE id_platforms IS NOT NULL
                AND p.price < 10
                ORDER BY RAND()';
    $cheapProductStatement = $database->prepare($sqlQuery);
    $cheapProductStatement->execute();
    $cheapProducts = $cheapProductStatement->fetchAll(PDO::FETCH_ASSOC);
    return $cheapProducts;
}