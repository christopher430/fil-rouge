<?php
require_once('../model/pictures_add.php');
require_once('../model/platforms_add.php');

function platforms_add()
{
    $msg = "";
    $msgPictures = "";
    $warning = "";
    $fileName = "";
  
    if(isset($_POST['submit'])) {
        $msgPictures = addPictures();
        if($msgPictures == 'Le fichier est trop volumineux ! ( Max : 1 Mo )' || $msgPictures == 'Merci de choisir un type de fichier valide !') {
            $warning = 'Le fichier n\'est pas valide';
        } else {
            $msg = insertPlatformsDatas();
        }
    }

    require('../templates/platforms_add.php');
}