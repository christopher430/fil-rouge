<?php
require_once('../model/connexion.php');

function getSearchProducts($search)
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
                AND p.name LIKE "%":search"%"
                ORDER BY RAND()';
    $productStatement = $database->prepare($sqlQuery);
    $productStatement->bindValue(':search', $search, PDO::PARAM_STR);
    $productStatement->execute();
    $products = $productStatement->fetchAll(PDO::FETCH_ASSOC);
    return $products;
}
