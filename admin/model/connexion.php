<?php
function dbConnect()
{
    $database = new PDO('mysql:host=localhost;dbname=filrougefront;charset=utf8',
    'root', '');
    return $database;
}