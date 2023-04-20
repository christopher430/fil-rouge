<?php
function dbConnect()
{
    $database = new PDO('mysql:host=localhost;dbname=filrougeback;charset=utf8',
    'root', '', [
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
      ]);
    return $database;
}