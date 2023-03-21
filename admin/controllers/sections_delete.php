<?php
require_once('../model/sections_delete.php');

function sections_delete()
{
    $idSection = $_GET['id'];
    $msg = "";
    $path = getPath($idSection);
    if($path != 'empty') {
        removeUploadsPictures($path);
        deleteTexts($idSection);
        deletePictures($idSection);
    }
    $msg= deleteSections($idSection);    

    require('../templates/sections_delete.php');
}