<?php
require_once('../model/connexion.php');

function getPictures()
{
    $database = dbConnect();
    $statement = $database->query(
    'SELECT * FROM pictures'
    );
    $pictures = [];
    while (($row = $statement->fetch())) {
        $picture = [
            'id' => $row['id'],
            'name' => $row['name'],
            'path' => $row['path'],
            ];
        $pictures[] = $picture;
    }
    return $pictures;
}