<?php
require_once('../model/connexion.php');

$msg='';

function getIdPictures($id)
{
    $database = dbConnect();
    $sqlQuery = 'SELECT id_pictures FROM platforms WHERE id = :id';
    $idPictureStatement = $database->prepare($sqlQuery);
    $idPictureStatement->bindValue(':id', $id, PDO::PARAM_INT);
    $idPictureStatement->execute();
    $idPictureTab = $idPictureStatement->fetch();
    $idPictures = $idPictureTab['id_pictures'];
    return $idPictures;
}

function deletePicture($idPictures)
{
    $database = dbConnect();
    $query = 'DELETE FROM pictures WHERE id=:id';
    $stmt = $database->prepare($query);
    $stmt->bindValue(':id', $idPictures, PDO::PARAM_INT);
    $stmt->execute();
}

function deleteUploadsPicture($idPictures)
{
    $path = getPicturePath($idPictures);
    unlink("../$path");
}

function getPicturePath($idPictures)
{
    $database = dbConnect();
    $sqlQuery = 'SELECT path FROM pictures WHERE id = :id';
    $pathStatement = $database->prepare($sqlQuery);
    $pathStatement->bindValue(':id', $idPictures, PDO::PARAM_INT);
    $pathStatement->execute();
    $pathTab = $pathStatement->fetch();
    $path = $pathTab['path'];
    return $path;
}

function deletePlatform($id)
{
    $database = dbConnect();
    $query = 'DELETE FROM platforms WHERE id=:id';
    $stmt = $database->prepare($query);
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $msg = 'La plateforme et la photo associée ont été supprimée';
    return $msg;
}