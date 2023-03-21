<?php
require_once('../model/pictures_edit.php');

function pictures_edit()
{
    $msg = "";
    if(isset($_GET['id'])) {
        $picturesId = $_GET['id'];
        $pictures = displayPicturesDatas($picturesId);
    }
    
    if(isset($_POST['submit'])) {
        $msg = editPicturesDatas($picturesId);
    }

    require('../templates/pictures_edit.php');
}