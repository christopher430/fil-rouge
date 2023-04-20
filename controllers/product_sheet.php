<?php
require_once('../model/layout.php');
require_once('../model/product_sheet.php');

function product_sheet($user) 
{
    if(isset($_GET['idProduct']) && isset($_GET['idPlatform'])) {
        $idProduct = $_GET['idProduct'];
        $idPlatform = $_GET['idPlatform'];
    }
    $cartsCounter = getCarts($user);
    $platforms = getPlatforms();
    $categories = getCategories();
    $products = getHomeProducts($idProduct, $idPlatform);

    require('../templates/product_sheet.php');
}