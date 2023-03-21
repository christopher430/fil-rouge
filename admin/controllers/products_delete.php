<?php
require_once('../model/products_delete.php');

function products_delete()
{
    $id = $_GET['id'];

    $idPictures = getIdPictures($id);
    deleteUploadsPicture($idPictures);
    deletePicture($idPictures);
    deletePlatormsEditions($id);
    $msg = deleteProduct($id);    

    require('../templates/products_delete.php');
}