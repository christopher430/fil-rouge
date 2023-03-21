<?php
require_once('../model/categories_edit.php');

function categories_edit()
{
    $msg = "";
    if(isset($_GET['id'])) {
        $categoriesId = $_GET['id'];
        $categories = displayCategoriesDatas($categoriesId);
    }
    
    if(isset($_POST['submit'])) {
        $msg = editCategoriesDatas($categoriesId, $categories[0]['name'],$categories[0]['description']);
        $categories = displayCategoriesDatas($categoriesId);
    }

    require('../templates/categories_edit.php');
}