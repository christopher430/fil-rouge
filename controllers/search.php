<?php
require_once('../model/search.php');
require_once('../model/layout.php');

function search($user) 
{
    $search = $_POST['search'];
    
    $cartsCounter = getCarts($user);
    $platforms = getPlatforms();
    $categories = getCategories();
    $products = getSearchProducts($search);

    require('../templates/search.php');
}