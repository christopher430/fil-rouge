<?php
require_once('../model/layout.php');
require_once('../model/display_order.php');

function display_order($user)
{
    $msg = '';
    $cartsCounter = getCarts($_SESSION['customer']);
    $platforms = getPlatforms();
    $categories = getCategories();
    $customer = getCustomers($_SESSION['customer']);
    $orders = getOrders($_SESSION['customer']);
    $totalPrice = getTotalPriceOrders($_SESSION['customer']);
    if(!empty($orders)) {
        $customerIdentifier = $orders[0]['customer_identifier'];
        $email = $orders[0]['customers_email'];
    }
    $customerId = $customer['id'];

    if(isset($_POST['sendEmail'])) {
        $success = sendEmail($email, $orders, $totalPrice);
        if($success) {
            $msg = '<h2 class="text-success">Un devis vous a été envoyé à l\'adresse : <span class="text-black">' . $email . '</span></h2>';
            setOrdersSent($customerIdentifier);
            $deleted = deleteCarts($customerIdentifier);
            if($deleted) {
                deleteCartsCustomers($customerId);
            }
        }
        header('Refresh: 10');
    }

    require('../templates/display_order.php');
}