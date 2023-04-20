<?php
require_once('../model/connexion.php');

function getCustomerInformations($customerIdentifier)
{
    $database = dbConnect();
    $sqlQuery = 'SELECT * FROM customers
                WHERE identifier = :identifier';
    $accountStatement = $database->prepare($sqlQuery);
    $accountStatement->bindValue(':identifier', $customerIdentifier, PDO::PARAM_INT);
    $accountStatement->execute();
    $accounts = $accountStatement->fetchAll();
    return $accounts;
}

function getAllOrdersHistory($customer)
{
    $database = dbConnect();
    $sqlQuery = 'SELECT o.id, o.identifier, p.name  FROM orders o
    INNER JOIN products p
    ON p.identifier = o.products_identifier
    INNER JOIN pictures pic
    ON pic.id = p.id_pictures
    WHERE customer_identifier = :customer_identifier
    AND sent = 1
    GROUP BY o.identifier';
    $allOrdersHistoryStatement = $database->prepare($sqlQuery);
    $allOrdersHistoryStatement->bindValue(':customer_identifier', $customer, PDO::PARAM_INT);
    $allOrdersHistoryStatement->execute();
    $allOrdersHistory = $allOrdersHistoryStatement->fetchAll();
    return $allOrdersHistory;
}

function getOrdersHistory($orderHistoryIdentifier)
{
    $database = dbConnect();
    $sqlQuery = 'SELECT * FROM orders o
                INNER JOIN products p
                ON p.identifier = o.products_identifier
                INNER JOIN pictures pic
                ON pic.id = p.id_pictures
                WHERE o.identifier = :identifier
                AND sent = 1';
    $orderHistoryStatement = $database->prepare($sqlQuery);
    $orderHistoryStatement->bindValue(':identifier', $orderHistoryIdentifier, PDO::PARAM_INT);
    $orderHistoryStatement->execute();
    $ordersHistory = $orderHistoryStatement->fetchAll();
    return $ordersHistory;
}

function getTotalPriceOrdersHistory($orderHistoryIdentifier)
{

    $database = dbConnect();
    $sqlQuery = 'SELECT SUM(carts_row_total) AS total_price FROM orders 
                WHERE identifier = :identifier
                AND sent = 1';
    $totalPriceHistoryStatement = $database->prepare($sqlQuery);
    $totalPriceHistoryStatement->bindValue(':identifier', $orderHistoryIdentifier, PDO::PARAM_INT);
    $totalPriceHistoryStatement->execute();
    $totalPriceHistory = $totalPriceHistoryStatement->fetch();
    return $totalPriceHistory;
}


function checkInputsAccount()
{
    if (!isset($_POST['email']) || (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
    || (!isset($_POST['name']) || empty($_POST['name']))
    || (!isset($_POST['forname']) || empty($_POST['forname']))
    || (!isset($_POST['billing_adress']) || empty($_POST['billing_adress']))
    || (!isset($_POST['delivery_adress']) || empty($_POST['delivery_adress']))
    || (!isset($_POST['password']) || empty($_POST['password']))
    || (!isset($_POST['check']) || empty($_POST['check']))) {
        $checkInputsAccount = false;
		return $checkInputsAccount;
    } else {
        $checkInputsAccount = true;
		return $checkInputsAccount;
    }
}

function editAccount($customerIdentifier)
{
    $identifier = $customerIdentifier;
    $name = $_POST['name'];
    $forname = $_POST['forname'];
    $billingAdress = $_POST['billing_adress'];
    $deliveryAdress = $_POST['delivery_adress'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $check = $_POST['check'];
    if ($password == $check) {
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $msgAccount = editCustomer($identifier, $name, $forname, $billingAdress, $deliveryAdress, $email, $password);
        return $msgAccount;
    } else {
        $msgAccount = '<h3 class="text-danger">Les mots de passe ne sont pas identiques</h3>';
        return $msgAccount;
    }
}

function editCustomer($identifier, $name, $forname, $billingAdress, $deliveryAdress, $email, $password)
{
    $database = dbConnect();
    $sqlQuery = 'UPDATE customers SET name = :name, forname = :forname, billing_adress = :billing_adress, delivery_adress = :delivery_adress, email = :email, password = :password
                WHERE identifier = :identifier';
    $stmt = $database->prepare($sqlQuery);
    $stmt->bindValue(':identifier', $identifier, PDO::PARAM_INT);
    $stmt->bindValue(':name', $name, PDO::PARAM_STR);
    $stmt->bindValue(':forname', $forname, PDO::PARAM_STR);
    $stmt->bindValue(':billing_adress', $billingAdress, PDO::PARAM_STR);
    $stmt->bindValue(':delivery_adress', $deliveryAdress, PDO::PARAM_STR);
    $stmt->bindValue(':email', $email, PDO::PARAM_STR);
    $stmt->bindValue(':password', $password, PDO::PARAM_STR);
    $success = $stmt->execute();
    if($success) {
        $msgAccount = '<h3 class="text-success ms-3">Vos informations ont été modifiées</h3>';
        return $msgAccount;
    }
}