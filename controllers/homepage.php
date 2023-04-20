<?php
require_once('../model/homepage.php');
require_once('../model/layout.php');

function homepage($user) 
{
    $verifyUserCarts = deleteDifferentUserCarts($user);
    $cartsCounter = getCarts($user);
    $platforms = getPlatforms();
    $categories = getCategories();
    $products = getHomeProducts();
    $lastProducts = getHomeLastProducts();
    $cheapProducts = getHomeCheapProducts();

    require('../templates/homepage.php');
}