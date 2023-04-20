<?php
require_once('../model/layout.php');
require_once('../model/display_by_platforms.php');

function display_by_platforms($user) 
{
    $cartsCounter = getCarts($user);
    $platforms = getPlatforms();
    $categories = getCategories();

    $idPlatform = $_GET['id'];

    $products = getPlatformsProducts($idPlatform);
    $lastProducts = getPlatformsLastProducts($idPlatform);
    $cheapProducts = getPlatformsCheapProducts($idPlatform);

    require('../templates/display_by_platforms.php');
}