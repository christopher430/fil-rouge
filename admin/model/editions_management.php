<?php
require_once('../model/connexion.php');

function getEditions()
{
    $database = dbConnect();
    $statement = $database->query(
    'SELECT * FROM editions'
    );
    $editions = [];
    while (($row = $statement->fetch())) {
        $edition = [
            'id' => $row['id'],
            'name' => $row['name'],
            ];
        $editions[] = $edition;
    }
    return $editions;
}