<?php
require_once('../model/connexion.php');

function getSubCategoriesId()
{
    $database = dbConnect();
    $statement = $database->query(
    'SELECT id FROM sub_categories WHERE `name`= :name'
    );
    $subCategories = [];
    $subCatIdStatement->bindValue(':nom', $sCatType, PDO::PARAM_STR);
    while (($row = $statement->fetch())) {
        $subCategorieId = [
            'id' => $row['id'],
            ];
        $subCategoriesId[] = $subCategorieId;
    }
    return $subCategoriesId;
}