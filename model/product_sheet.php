<?php
require_once('../model/connexion.php');

function getHomeProducts($idProduct, $idPlatform)
{
    $database = dbConnect();
    $sqlQuery = 'SELECT p.id, p.identifier, p.name, p.description, p.features_1, p.features_2, p.price, pic.path, plt.id AS platform_id, plt.name AS platform_name, sc.name AS sub_cat_name
                FROM products p 
                INNER JOIN pictures pic 
                ON p.id_pictures = pic.id
                INNER JOIN products_platforms_editions ppe
                ON p.id = ppe.id_products
                INNER JOIN platforms plt
                ON plt.id = ppe.id_platforms
                INNER JOIN sub_categories sc
                ON sc.id = p.id_sub_categories
                -- WHERE id_platforms IS NOT NULL
                WHERE p.id = :idProduct
                AND plt.id = :idPlatform';
    $productStatement = $database->prepare($sqlQuery);
    $productStatement ->bindValue(':idProduct', $idProduct, PDO::PARAM_INT);
    $productStatement ->bindValue(':idPlatform', $idPlatform, PDO::PARAM_INT);
    $productStatement->execute();
    $products = $productStatement->fetchAll(PDO::FETCH_ASSOC);

    return $products;
}