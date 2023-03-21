<?php
require_once('../model/products_add.php');
require_once('../model/categories_management.php');
require_once('../model/sub_categories_management.php');
require_once('../model/platforms_management.php');
require_once('../model/editions_management.php');
require_once('../model/pictures_add.php');

function products_add()
{
    $msg = "";
    $msgPictures = "";
    $warning = "";
    $fileName = "";
    $categories = getCategories();
    $subCategories = getSubCategories();
    $platforms = getPlatforms();
    $editions = getEditions();
    
    if(isset($_POST['submit'])) {
        $check = checkInputs();

        if($check) {    
            $msgPictures = addPictures();
            if($msgPictures == 'Le fichier est trop volumineux ! ( Max : 1 Mo )' || $msgPictures == 'Merci de choisir un type de fichier valide !') {
                $warning = 'Le fichier n\'est pas valide';
            } else {
                $insertProductsDatas = insertProductsDatas($msgPictures);
                $msg = $insertProductsDatas;    
            }
        } else {
            $msg ='<h3 class="text-danger mt-3">Il faut remplir tous les champs pour soumettre le formulaire.</h3>';
        }    
    }

    require('../templates/products_add.php');
}