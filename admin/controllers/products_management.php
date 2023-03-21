<?php
require_once('../model/products_management.php');

function products_management()
{
    $products= getProducts();
    
    require('../templates/products_management.php');
}