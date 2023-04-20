<?php
require_once('../model/connexion.php');

function getPlatformsProducts($idPlatform)
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
                AND id_platforms = :id
                ORDER BY RAND()';
    $productStatement = $database->prepare($sqlQuery);
    $productStatement->bindValue(':id', $idPlatform, PDO::PARAM_INT);
    $productStatement->execute();
    $products = $productStatement->fetchAll(PDO::FETCH_ASSOC);
    return $products;
}

function getPlatformsLastProducts($idPlatform)
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
                AND id_platforms = :id
                ORDER BY RAND()';
    $lastProductStatement = $database->prepare($sqlQuery);
    $lastProductStatement->bindValue(':id', $idPlatform, PDO::PARAM_INT);
    $lastProductStatement->execute();
    $lastProducts = $lastProductStatement->fetchAll(PDO::FETCH_ASSOC);
    return $lastProducts;
}

function getPlatformsCheapProducts($idPlatform)
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
                AND id_platforms = :id
                AND p.price < 10
                ORDER BY RAND()';
    $cheapProductStatement = $database->prepare($sqlQuery);
    $cheapProductStatement->bindValue(':id', $idPlatform, PDO::PARAM_INT);
    $cheapProductStatement->execute();
    $cheapProducts = $cheapProductStatement->fetchAll(PDO::FETCH_ASSOC);
    return $cheapProducts;
}