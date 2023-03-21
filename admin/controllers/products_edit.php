<?php
require_once('../model/products_edit.php');
require_once('../model/categories_management.php');
require_once('../model/sub_categories_management.php');
require_once('../model/platforms_management.php');
require_once('../model/editions_management.php');
require_once('../model/pictures_add.php');

function products_edit()
{
    $msg = "";
    $msgPictures = "";
    $warning = "";

    $platforms = getPlatforms();
    $editions = getEditions();
    if(isset($_GET['id'])) {
        $productsId = $_GET['id'];
        $products = displayProductsDatas($productsId);
        $firstPictureName = displayPicturesDatas($products[0]['id_pictures']);
        $subCategories = getSubCategories();
        $categories = getCategories();
        $displayNameSubCategories = displayNameSubCategories($products[0]['id_sub_categories']);
        $displayNameSubCategorie = $displayNameSubCategories[0]['name'];
    }
    
    if(isset($_POST['submit'])) {
        $checkInputs = checkInputs();
        if($checkInputs) {
            deleteUploadsPicture($products[0]['id_pictures']);
            deletePlatormsEditions($productsId);
            $msgPictures = addPictures();
            if($msgPictures == 'Le fichier est trop volumineux ! ( Max : 1 Mo )' || $msgPictures == 'Merci de choisir un type de fichier valide !') {
                $warning = 'Le fichier n\'est pas valide';
            } else {
                $msg = editProductsDatas($productsId, $firstPictureName);
                $platforms = getPlatforms();
                $editions = getEditions();
                $products = displayProductsDatas($productsId);
                $firstPictureName = displayPicturesDatas($products[0]['id_pictures']);
                $subCategories = getSubCategories();
                $categories = getCategories();
                $displayNameSubCategories = displayNameSubCategories($products[0]['id_sub_categories']);
                $displayNameSubCategorie = $displayNameSubCategories[0]['name'];
        
            }
        } else {
            $msg ='<h3 class="text-danger mt-3">Il faut remplir tous les champs pour soumettre le formulaire.</h3>';
        }
    }

    require('../templates/products_edit.php');
}