<?php
require_once('../model/platforms_delete.php');

function platforms_delete()
{
    $id = $_GET['id'];
    $msg = "";
    $idPictures = getIdPictures($id);
    deleteUploadsPicture($idPictures);
    deletePicture($idPictures);
    $msg = deletePlatform($id);

    require('../templates/platforms_delete.php');
}