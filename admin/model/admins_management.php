<?php
require_once('../model/connexion.php');

function getAdmins()
{
    $database = dbConnect();
    $statement = $database->query(
    'SELECT * FROM admins'
    );
    $admins = [];
    while (($row = $statement->fetch())) {
        $admin = [
            'id' => $row['id'],
            'name' => $row['name'],
            'forname' => $row['forname'],
            'email' => $row['email'],
            'password' => $row['password'],
            ];
        $admins[] = $admin;
    }
    return $admins;
}