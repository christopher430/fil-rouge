<?php
require_once('../model/sub_categories_edit.php');
require_once('../model/categories_management.php');

function sub_categories_edit()
{
    $msg = "";
    $categories = getCategories();
    
    if(isset($_GET['id'])) {
        $subCategoriesId = $_GET['id'];
        $subCategories = displaySubCategoriesDatas($subCategoriesId);
        $displayNameCategories = displayNameCategories($subCategories[0]['id_categories']);
    }
    
    if(isset($_POST['submit'])) {
        $msg = editSubCategoriesDatas($subCategoriesId, $subCategories[0]['name'],$subCategories[0]['description']);
        $subCategories = displaySubCategoriesDatas($subCategoriesId);
        $displayNameCategories = displayNameCategories($subCategories[0]['id_categories']);
    }

    require('../templates/sub_categories_edit.php');
}