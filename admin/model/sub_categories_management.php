<?php
require_once('../model/connexion.php');

$msg='';

function getSubCategories()
{
    $database = dbConnect();
    $statement = $database->query(
    'SELECT * FROM sub_categories ORDER BY `name` ASC'
    );
    $subCategories = [];
    while (($row = $statement->fetch())) {
        $subCategory = [
            'id' => $row['id'],
            'name' => $row['name'],
            'description' => $row['description'],
            'is_enabled' => $row['is_enabled'],
            ];
        $subCategories[] = $subCategory;
    }
    return $subCategories;
}