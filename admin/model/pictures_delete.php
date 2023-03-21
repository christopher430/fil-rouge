<?php
require_once('../model/connexion.php');

$msg='';

function delete($id)
{
    $database = dbConnect();
    $query = 'DELETE FROM pictures WHERE id=:id';
    $req = $database->prepare($query);
    $req->bindValue(':id', $id, PDO::PARAM_INT);
    $req->execute();
    $msg = 'La photo a été supprimée';
    return $msg;
}