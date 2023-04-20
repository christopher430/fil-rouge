<?php
require_once('../model/layout.php');
require_once('../model/account.php');

function account()
{
    $msgAccount = '';
    if(isset($_SESSION['customer'])) {
        $cartsCounter = getCarts($_SESSION['customer']);
    } else {         
        $cartsCounter = getCarts($_SESSION['user']);
    }
    $platforms = getPlatforms();
    $categories = getCategories();

    $customerIdentifier = $_GET['customerIdentifier'];

    $accounts = getCustomerInformations($customerIdentifier);
    if(isset($_POST['selectOrder'])) {
        $orderHistoryIdentifier = $_POST['selectOrder'];
        $ordersHistory = getOrdersHistory($_SESSION['customer'], $orderHistoryIdentifier);
        $totalPriceHistory = getTotalPriceOrdersHistory($orderHistoryIdentifier);
    }
    $allOrdersHistory = getAllOrdersHistory($_SESSION['customer']);


    if(isset($_POST['submit'])) {
        $checkInputsAccount = checkInputsAccount();

        if($checkInputsAccount) {
            $msgAccount = editAccount($customerIdentifier);
            $accounts = getCustomerInformations($customerIdentifier);
        } else {
            $msgAccount ='<h3 class="text-danger mt-3">Il faut remplir tous les champs pour créer un compte</h3>';
        }
    }

    require('../templates/account.php');
}