<?php
require_once('../model/pictures_add.php');

function pictures_add()
{
    $msg = "";
    $msgPictures = "";

    $id = $_GET['id'];
    
    if(isset($_POST['submit'])) {
        $msgPictures = insertPictures();
        $msg = insertDatas($id);
    }

    require('../templates/pictures_add.php');
}