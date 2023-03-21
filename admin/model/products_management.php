<?php
require_once('../model/connexion.php');

function getProducts()
{
    $database = dbConnect();
    $statement = $database->query(
    'SELECT * FROM products ORDER BY `name` ASC'
    );
    $products = [];
    while (($row = $statement->fetch())) {
        $product = [
            'id' => $row['id'],
            'identifier' => $row['identifier'],
            'name' => $row['name'],
            'description' => $row['description'],
            'features_1' => $row['features_1'],
            'features_2' => $row['features_2'],
            'is_enabled' => $row['is_enabled'],
            'id_sub_categories' => $row['id_sub_categories'],
            'id_pictures' => $row['id_pictures'],
            ];
        $idSubCat = $product['id_sub_categories'];
        $nameSubCategories = getSubCategoriesName($idSubCat);
        $product['sub_category_name'] = $nameSubCategories;

        $id = $product['id'];
        $platformIds = getPlatformIds($id);
        $product['platform_number'] = count($platformIds);
        for($i = 0; $i < count($platformIds); $i++) {
            $platformNames = getPlatformNames($platformIds[$i]['id_platforms']);
            $product["platform_name_$i"] = $platformNames[0]['name'];
        }
        $editionIds = getEditionIds($id);
        $product['edition_number'] = count($editionIds);
        for($i = 0; $i < count($editionIds); $i++) {
            $editionNames = getEditionNames($editionIds[$i]['id_editions']);
            $product["edition_name_$i"] = $editionNames[0]['name'];
        }

        $pictureId = $product['id_pictures'];
        $picturePath = getPicturepicturePath($pictureId);
        $product['picture_path'] = $picturePath;

        $products[] = $product;
    }
    return $products;
}

function getSubCategoriesName($id)
{
    $database = dbConnect();
    $sqlQuery = 'SELECT name FROM sub_categories WHERE id = :id';
    $subCatIdStatement = $database->prepare($sqlQuery);
    $subCatIdStatement->bindValue(':id', $id, PDO::PARAM_INT);
    $subCatIdStatement->execute();
    $nameSubCategoriesTab = $subCatIdStatement->fetch();
    $nameSubCategories = $nameSubCategoriesTab['name'];
    return $nameSubCategories;
}

function getPlatformIds($id)
{
    $database = dbConnect();
    $sqlQuery = 'SELECT id_platforms FROM products_platforms_editions WHERE (id_products = :id AND id_platforms IS NOT NULL)';
    $platformIdStatement = $database->prepare($sqlQuery);
    $platformIdStatement->bindValue(':id', $id, PDO::PARAM_INT);
    $platformIdStatement->execute();
    $platformIds = $platformIdStatement->fetchAll();
    return $platformIds;
}

function getPlatformNames($platformId)
{
    $database = dbConnect();
    $sqlQuery = 'SELECT name FROM platforms WHERE id = :id';
    $platformNameStatement = $database->prepare($sqlQuery);
    $platformNameStatement->bindValue(':id', $platformId, PDO::PARAM_INT);
    $platformNameStatement->execute();
    $platformNames = $platformNameStatement->fetchAll();
    return $platformNames;
}

function getEditionIds($id)
{
    $database = dbConnect();
    $sqlQuery = 'SELECT id_editions FROM products_platforms_editions WHERE (id_products = :id AND id_editions IS NOT NULL)';
    $editionIdStatement = $database->prepare($sqlQuery);
    $editionIdStatement->bindValue(':id', $id, PDO::PARAM_INT);
    $editionIdStatement->execute();
    $editionIds = $editionIdStatement->fetchAll();
    return $editionIds;
}

function getEditionNames($editionId)
{
    $database = dbConnect();
    $sqlQuery = 'SELECT name FROM editions WHERE id = :id';
    $editionNameStatement = $database->prepare($sqlQuery);
    $editionNameStatement->bindValue(':id', $editionId, PDO::PARAM_INT);
    $editionNameStatement->execute();
    $editionNames = $editionNameStatement->fetchAll();
    return $editionNames;
}

function getPicturepicturePath($pictureId)
{
    $database = dbConnect();
    $statement = $database->prepare(
    'SELECT path FROM pictures
    WHERE id = :id' 
    );
    $statement->bindValue(':id', $pictureId, PDO::PARAM_INT);
    $statement->execute();
    
    $picturePaths = [];
    while (($row = $statement->fetch())) {
        $picturePath = [
            'path' => $row['path'],
        ];
        $picturePaths[] = $picturePath;
    }
    $picturePath = $picturePaths[0]['path'];
    return $picturePath;
}