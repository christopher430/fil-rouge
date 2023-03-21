<?php
require_once('../model/connexion.php');

$msg='';

function delete($id)
{
    $database = dbConnect();
    $query = 'DELETE FROM categories WHERE id=:id';
    $req = $database->prepare($query);
    $req->bindValue(':id', $id, PDO::PARAM_INT);
    $req->execute();
    $msg = 'La catégorie a été supprimée';
    return $msg;
}