<?php
// controllers/homepage.php
require_once('../model/products_management.php');

function products_management($p) {
    $products= getProducts();
    $disconnect = $p;
    require('../templates/products_management.php');
}