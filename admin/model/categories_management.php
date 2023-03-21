<?php
require_once('../model/connexion.php');

$msg='';

function getCategories()
{
    $database = dbConnect();
    $statement = $database->query(
    'SELECT * FROM categories ORDER BY `name` ASC'
    );
    $categories = [];
    while (($row = $statement->fetch())) {
        $category = [
            'id' => $row['id'],
            'name' => $row['name'],
            'description' => $row['description'],
            'is_enabled' => $row['is_enabled'],
            ];
        $categories[] = $category;
    }
    return $categories;
}