<?php
function dbConnect()
{
    $database = new PDO('mysql:host=localhost;dbname=filrougeback;charset=utf8',
    'root', '');
    return $database;
}