<?php
require_once('../model/pictures_multiple_add.php');

function pictures_multiple_add()
{
    $msg = "";
    $msgPictures = "";

    $id = $_GET['id'];
    
    if(isset($_POST['submit'])) {
        
        $checkInputs = checkInputs();
        if($checkInputs) {
            $msgPictures = insertMultiplePictures($id);
        } else {
            $msg ='<h3 class="text-danger mt-3">Il faut remplir tous les champs pour soumettre le formulaire.</h3>';
        }
    }

    require('../templates/pictures_multiple_add.php');
}