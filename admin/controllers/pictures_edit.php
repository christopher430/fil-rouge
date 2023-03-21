<?php
require_once('../model/pictures_edit.php');
require_once('../model/pictures_add.php');


function pictures_edit()
{
    $msg = "";
    $msgPictures = "";

    if(isset($_GET['id'])) {
        $picturesId = $_GET['id'];
        $firstPictureName = displayPicturesDatas($picturesId);

        if(isset($_POST['submit'])) {
            deleteUploadsPicture($picturesId);
            $msgPictures = insertPictures();
            $msg = editPicturesDatas($picturesId, $firstPictureName);
        }    
    }
    

    require('../templates/pictures_edit.php');
}