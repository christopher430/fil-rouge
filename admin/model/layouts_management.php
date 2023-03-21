<?php
require_once('../model/connexion.php');

function getLayouts()
{
    $database = dbConnect();
    $statement = $database->query(
    'SELECT * FROM layouts'
    );
    $layouts = [];
    while (($row = $statement->fetch())) {
        $layout = [
            'id' => $row['id'],
            'name' => $row['name'],
            'is_enabled' => $row['is_enabled'],
            ];
        $layouts[] = $layout;
    }
    return $layouts;
}