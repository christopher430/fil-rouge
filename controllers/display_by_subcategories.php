<?php
require_once('../model/layout.php');
require_once('../model/display_by_subcategories.php');

function display_by_subcategories($user) 
{
    $cartsCounter = getCarts($user);
    $platforms = getPlatforms();
    $categories = getCategories();

    $idSubCategory = $_GET['id'];

    $products = getSubCategoriesProducts($idSubCategory);
    $lastProducts = getSubCategoriesLastProducts($idSubCategory);
    $cheapProducts = getSubCategoriesCheapProducts($idSubCategory);

    require('../templates/display_by_subcategories.php');
}