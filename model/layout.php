<?php
require_once('../model/connexion.php');

function getPlatforms()
{
    $database = dbConnect();
    $sqlQuery = 'SELECT plt.id, plt.name, pic.path FROM platforms plt
                INNER JOIN pictures pic
                ON plt.id_pictures = pic.id
                ORDER BY name ASC';
    $platformStatement = $database->prepare($sqlQuery);
    $platformStatement->execute();
    $platforms = $platformStatement->fetchAll(PDO::FETCH_ASSOC);
    return $platforms;
}

function getCategories()
{
    $database = dbConnect();
    $statement = $database->query(
    'SELECT * FROM categories'
    );
    $categories = [];
    while (($row = $statement->fetch())) {
        $category = [
            'id' => $row['id'],
            'name' => $row['name'],
            'description' => $row['description'],
            ];

        $idCategory = $category['id'];
        $subCategories = getSubCategories($idCategory);

        for($i=0; $i < count($subCategories); $i++) {
            $category["sub_category_name_$i"] = $subCategories[$i];
        }

        $categories[] = $category;
    }

    return $categories;
}

function getSubCategories($idCategory)
{
    $database = dbConnect();
    $statement = $database->prepare('SELECT id, name FROM sub_categories WHERE id_categories = :id_categories');
    $statement->bindValue(':id_categories', $idCategory, PDO::PARAM_INT);
    $statement->execute();
    $subCategories = [];
    while (($row = $statement->fetch())) {
        $subCategory = [
            'id' => $row['id'],
            'name' => $row['name'],
            ];
        $subCategories[] = $subCategory;
    }
    return $subCategories;
}

function getCarts($user)
{
    $database = dbConnect();
    $sqlQuery = 'SELECT SUM(quantity) AS quantity FROM carts
                WHERE identifier_customer = :customerIdentifier';
    $cartStatement = $database->prepare($sqlQuery);
    $cartStatement->bindValue(':customerIdentifier', $user, PDO::PARAM_INT);
    $cartStatement->execute();
    $carts = $cartStatement->fetch(PDO::FETCH_ASSOC);
    return $carts['quantity'];
}