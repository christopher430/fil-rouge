<?php
require_once('../model/platforms_edit.php');
require_once('../model/pictures_add.php');


function platforms_edit()
{
    $msg = "";
    $msgPictures = "";
    $warning = "";

    if(isset($_GET['id'])) {
        $platformsId = $_GET['id'];
        $platforms = displayPlatformsDatas($platformsId);
        $firstPictureName = displayPicturesDatas($platforms[0]['id_pictures']);

        if(isset($_POST['submit'])) {
            deleteUploadsPicture($platforms[0]['id_pictures']);
            $msgPictures = addPictures();
            if($msgPictures == 'Le fichier est trop volumineux ! ( Max : 1 Mo )' || $msgPictures == 'Merci de choisir un type de fichier valide !') {
                $warning = 'Le fichier n\'est pas valide';
            } else {
                $msg = editplatformsDatas($platformsId, $firstPictureName);
                $platforms = displayPlatformsDatas($platformsId);
                $firstPictureName = displayPicturesDatas($platforms[0]['id_pictures']);        
            }
        }    
    }

    require('../templates/platforms_edit.php');
}