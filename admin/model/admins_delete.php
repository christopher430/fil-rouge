<?php
require_once('../model/connexion.php');

$msg='';

function delete($id)
{
    $database = dbConnect();
    $query = 'DELETE FROM admins WHERE id=:id';
    $stmt = $database->prepare($query);
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $msg = 'L\'administrateur a été supprimé';
    return $msg;
}