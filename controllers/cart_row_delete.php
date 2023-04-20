<?php
require_once('../model/layout.php');
require_once('../model/cart_row_delete.php');
require_once('../controllers/basket_display.php');

function cart_row_delete() 
{
    $cartId = $_GET['cartId'];

    row_delete($cartId);
    if(isset($_SESSION['user'])) {
        basket_display($_SESSION['user']);
    } elseif(isset($_SESSION['customer'])) {
        basket_display($_SESSION['customer']);
    }

    require('../templates/basket_display.php');
}