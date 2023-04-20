<?php
require_once('../model/layout.php');
require_once('../model/basket_add.php');

function basket_add($user) 
{
    if(isset($_GET['identifierUser']) && isset($_GET['identifierProduct']) && isset($_GET['price'])) {
        $identifierUser = $_GET['identifierUser'];
        $identifierProduct = $_GET['identifierProduct'];
        $price = $_GET['price'];
    }
    $cartsCounter = getCarts($user);
    $platforms = getPlatforms();
    $categories = getCategories();
    $productControl = productControl($identifierUser);

    if($identifierProduct == $productControl['identifier_product']) {
        updateCartQuantity($identifierProduct);
    } else {
        addToCarts($identifierUser, $identifierProduct, $price);
    }
    header('location: index.php');

    require('../templates/product_sheet.php');
}