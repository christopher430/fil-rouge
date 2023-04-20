<?php
require_once('../model/layout.php');
require_once('../model/account_delete.php');

function account_delete($user)
{
    $msg = '';
    $cartsCounter = getCarts($user);
    $platforms = getPlatforms();
    $categories = getCategories();

    $accountId = $_GET['accountId'];
    $customerIdentifier = getCustomerIdentifier($accountId);
    $msg = deleteAccount($accountId, $customerIdentifier);

    require('../templates/account_delete.php');
}