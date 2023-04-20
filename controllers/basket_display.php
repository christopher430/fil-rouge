<?php
require_once('../model/layout.php');
require_once('../model/basket_display.php');

function basket_display() 
{
    if(isset($_SESSION['customer'])) {
        $cartsCounter = getCarts($_SESSION['customer']);
    } else {
        $cartsCounter = getCarts($_SESSION['user']);
    }
    $platforms = getPlatforms();
    $categories = getCategories();

    if(isset($_SESSION['customer'])) {
        $carts = getCustomerCarts($_SESSION['customer']);
        $customerIdentifier = $_SESSION['customer'];
        if(!empty($carts)) {
            $customerName = $carts[0]['customer_name'];
            $customerForname = $carts[0]['customer_forname'];
            $customerEmail = $carts[0]['customer_email'];
            $customerBillingAdress = $carts[0]['customer_billing_adress'];
            $customerDeliveryAdress = $carts[0]['customer_delivery_adress'];
            $cartIdentifier = $carts[0]['carts_identifier'];
            $cartPrice = $carts[0]['product_price'];
            $productIdentifier = $carts[0]['product_identifier'];
            $productName = $carts[0]['product_name'];
        }
    } else {
        $carts = getUserCarts($_SESSION['user']);
    }

    if(isset($_POST['submit'])) {
        $order = verifyOrder($_SESSION['customer']);
        if(!empty($order)) {
            deleteOrder($_SESSION['customer']);
        }
        $identifier = time();
        for($i = 0; $i < count($carts); $i++) {
            $comment = $_POST['comment'];
            $cartQuantity = $carts[$i]['product_quantity'];
            $customerIdentifier = $_SESSION['customer'];
            $customerName = $carts[$i]['customer_name'];
            $customerForname = $carts[$i]['customer_forname'];
            $customerEmail = $carts[$i]['customer_email'];
            $customerBillingAdress = $carts[$i]['customer_billing_adress'];
            $customerDeliveryAdress = $carts[$i]['customer_delivery_adress'];
            $cartIdentifier = $carts[$i]['carts_identifier'];
            $cartPrice = $carts[$i]['product_price'];
            $productIdentifier = $carts[$i]['product_identifier'];
            $productName = $carts[$i]['product_name'];
            $cartRowTotal = $carts[$i]['product_row_total']; 
            $orders = insertIntoOrders($identifier, $customerIdentifier,  $customerName, $customerForname, $customerEmail, $customerBillingAdress, $customerDeliveryAdress, $cartIdentifier, $cartPrice, $cartQuantity, $cartRowTotal, $productIdentifier, $productName, $comment);
        }
        header('location: index.php?action=order');
    }

    require('../templates/basket_display.php');
}