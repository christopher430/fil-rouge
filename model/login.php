<?php
require_once('../model/connexion.php');

function createSession($idCart)
{
    $emailConnection = $_POST['emailConnection'];
    $passwordConnection = $_POST['passwordConnection'];
    $customer = getCustomerDatas($emailConnection);
    if(!empty($customer)) {
        if(password_verify($passwordConnection, $customer['password'])) {
            $_SESSION['email'] = $customer['email'];
            $_SESSION['password'] = $customer['password'];
            $_SESSION['forname'] = $customer['forname'];
            $_SESSION['customer'] = $customer['identifier'];
            $user = $_SESSION['customer'];
            $bound = 1;
            for($i = 0; $i < count($idCart); $i++) {
                updateCarts($user, $idCart[$i]['id'], $bound);
                updateCartsCustomers($idCart[$i]['id'], $customer['id']);
            }
            $msgLogin = 'success';
            return $msgLogin;
        } else {
            $msgLogin = '<h3 class="text-danger mt-3 ms-3">Vérifiez l\'email et le mot de passe</h3>';
            return $msgLogin;
        }
    } else {
        $msgLogin = '<h3 class="text-danger mt-3 ms-3">Aucun compte n\'est associé à cette adresse Email !</h3>';
        return $msgLogin;
    }
}

function createAccount($userIdentifier)
{
    $identifier = $userIdentifier;
    $nameAccount = $_POST['nameAccount'];
    $fornameAccount = $_POST['fornameAccount'];
    $adressAccount = $_POST['adressAccount'];
    $emailAccount = $_POST['emailAccount'];
    $passwordAccount = $_POST['passwordAccount'];
    $checkAccount = $_POST['checkAccount'];
    if ($passwordAccount == $checkAccount) {
        $passwordAccount = password_hash($_POST['passwordAccount'], PASSWORD_DEFAULT);
        $msgAccount = addCustomer($identifier, $nameAccount, $fornameAccount, $adressAccount, $emailAccount, $passwordAccount);
        return $msgAccount;
    } else {
        $msgAccount = '<h3 class="text-danger">Les mots de passe ne sont pas identiques</h3>';
        return $msgAccount;
    }
}

function checkInputsLogin()
{
    if (!isset($_POST['emailConnection']) || (!filter_var($_POST['emailConnection'], FILTER_VALIDATE_EMAIL))
    || (!isset($_POST['passwordConnection']) || empty($_POST['passwordConnection']))) {
        $checkInputsLogin = false;
		return $checkInputsLogin;
    } else {
        $checkInputsLogin = true;
		return $checkInputsLogin;
    }
}

function checkInputsAccount()
{
    if (!isset($_POST['emailAccount']) || (!filter_var($_POST['emailAccount'], FILTER_VALIDATE_EMAIL))
    || (!isset($_POST['nameAccount']) || empty($_POST['nameAccount']))
    || (!isset($_POST['fornameAccount']) || empty($_POST['fornameAccount']))
    || (!isset($_POST['adressAccount']) || empty($_POST['adressAccount']))
    || (!isset($_POST['passwordAccount']) || empty($_POST['passwordAccount']))
    || (!isset($_POST['checkAccount']) || empty($_POST['checkAccount']))) {
        $checkInputsAccount = false;
		return $checkInputsAccount;
    } else {
        $checkInputsAccount = true;
		return $checkInputsAccount;
    }
}

function getCustomerDatas($email)
{
    $database = dbConnect();
    $sqlQuery = 'SELECT id, identifier, email, password, forname FROM customers WHERE email = :email';
    $customerStatement = $database->prepare($sqlQuery);
    $customerStatement->bindValue(':email', $email, PDO::PARAM_STR);
    $customerStatement->execute();
    $customer = $customerStatement->fetch();
    return $customer;
}

function updateCarts($user, $idCart, $bound)
{
    $database = dbConnect();
    $sqlQuery = 'UPDATE carts SET identifier_customer = :identifier_customer, bounded = :bounded WHERE id = :id';
    $stmt = $database->prepare($sqlQuery);
    $stmt->bindValue(':identifier_customer', $user, PDO::PARAM_INT);
    $stmt->bindValue(':bounded', $bound, PDO::PARAM_BOOL);
    $stmt->bindValue(':id', $idCart, PDO::PARAM_INT);
    $stmt->execute();
}

function updateCartsCustomers($idCart, $idCustomer)
{
    $database = dbConnect();
    $sqlQuery = 'UPDATE carts_customers SET id_customer = :id_customer WHERE id_cart = :id_cart ';
    $stmt = $database->prepare($sqlQuery);
    $stmt->bindValue(':id_customer', $idCustomer, PDO::PARAM_INT);
    $stmt->bindValue(':id_cart', $idCart, PDO::PARAM_INT);
    $stmt->execute();
}

function addCustomer($identifier, $nameAccount, $fornameAccount, $adressAccount, $emailAccount, $passwordAccount)
{
    $database = dbConnect();
    $sqlQuery = 'INSERT INTO customers(identifier, name, forname, billing_adress, delivery_adress, email, password) VALUES (:identifier, :name, :forname, :billing_adress, :delivery_adress, :email, :password)';
    $stmt = $database->prepare($sqlQuery);
    $stmt->bindValue(':identifier', $identifier, PDO::PARAM_INT);
    $stmt->bindValue(':name', $nameAccount, PDO::PARAM_STR);
    $stmt->bindValue(':forname', $fornameAccount, PDO::PARAM_STR);
    $stmt->bindValue(':billing_adress', $adressAccount, PDO::PARAM_STR);
    $stmt->bindValue(':delivery_adress', $adressAccount, PDO::PARAM_STR);
    $stmt->bindValue(':email', $emailAccount, PDO::PARAM_STR);
    $stmt->bindValue(':password', $passwordAccount, PDO::PARAM_STR);
    $stmt->execute();
    $msgAccount = '<h3 class="text-success ms-3">Votre compte a été crée, vous pouvez vous connecter</h3>';
    return $msgAccount;
}

function getIdCustomer($identifier)
{
    $database = dbConnect();
    $sqlQuery = 'SELECT id FROM customers WHERE identifier = :identifier';
    $customerStatement = $database->prepare($sqlQuery);
    $customerStatement->bindValue(':identifier', $identifier, PDO::PARAM_INT);
    $customerStatement->execute();
    $customer = $customerStatement->fetch();
    return $customer;
}

function getIdCarts($identifier)
{
    $database = dbConnect();
    $sqlQuery = 'SELECT id FROM carts WHERE identifier_customer = :identifier_customer';
    $cartStatement = $database->prepare($sqlQuery);
    $cartStatement->bindValue(':identifier_customer', $identifier, PDO::PARAM_INT);
    $cartStatement->execute();
    $carts = $cartStatement->fetchAll();
    return $carts;
}

function boundCartCustomer($cartId, $customerId)
{
    $database = dbConnect();
    $sqlQuery = 'INSERT INTO carts_customers(id_cart, id_customer) VALUES (:id_cart, :id_customer)';
    $stmt = $database->prepare($sqlQuery);
    $stmt->bindValue(':id_cart', $cartId, PDO::PARAM_INT);
    $stmt->bindValue(':id_customer', $customerId, PDO::PARAM_INT);
    $stmt->execute();
}