<?php
require_once('../model/connexion.php');
require_once('../assets/PHPMailer-6.8.0/src/PHPMailer.php');
require_once('../assets/PHPMailer-6.8.0/src/SMTP.php');
require_once('../assets/PHPMailer-6.8.0/src/Exception.php');

function getCustomers($customer)
{
    $database = dbConnect();
    $sqlQuery = 'SELECT id FROM customers WHERE identifier = :identifier';
    $customerStatement = $database->prepare($sqlQuery);
    $customerStatement->bindValue(':identifier', $customer, PDO::PARAM_INT);
    $customerStatement->execute();
    $customer = $customerStatement->fetch();
    return $customer;
}

function getOrders($customer)
{
    $database = dbConnect();
    $sqlQuery = 'SELECT * FROM orders o
                INNER JOIN products p
                ON p.identifier = o.products_identifier
                INNER JOIN pictures pic
                ON pic.id = p.id_pictures
                WHERE customer_identifier = :customer_identifier
                AND sent = 0';
    $orderStatement = $database->prepare($sqlQuery);
    $orderStatement->bindValue(':customer_identifier', $customer, PDO::PARAM_INT);
    $orderStatement->execute();
    $orders = $orderStatement->fetchAll();
    return $orders;
}


function getTotalPriceOrders($customer)
{
    $database = dbConnect();
    $sqlQuery = 'SELECT SUM(carts_row_total) AS total_price FROM orders 
                WHERE customer_identifier = :customer_identifier
                AND sent = 0';
    $totalPriceStatement = $database->prepare($sqlQuery);
    $totalPriceStatement->bindValue(':customer_identifier', $customer, PDO::PARAM_INT);
    $totalPriceStatement->execute();
    $totalPrice = $totalPriceStatement->fetch();
    return $totalPrice;
}


function sendEmail($email, $orders, $totalPrice)
{
    $recipient = $email;
    $subject = "Récapitulatif de votre commande n°" . $orders[0]['carts_identifier'];
    $header = "From: GameRecycle" . "\r\n";
    $header .= "MIME-Version: 1.0" . "\r\n";
    $header .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $message = '<table style="border: solid 1px black; border-collapse: collapse;">';
    $message .= '<tr><td style="border: solid 1px black;">Nom</td><td style="border: solid 1px black;">Prix</td><td style="border: solid 1px black;">Quantité</td><td style="border: solid 1px black;">Total</td></tr>';
    foreach($orders as $order) {
        $message .= '<tr><td style="border: solid 1px black;">' .$order['products_name']. '</td><td style="border: solid 1px black;">' .$order['carts_price']. '</td><td style="border: solid 1px black;">' .$order['carts_quantity']. '</td><td style="border: solid 1px black;">' .$order['carts_row_total']. '</td></tr>';
    }
    $message .= '<tr><td></td><td></td><td style="border: solid 1px black;"><strong>TOTAL</strong></td><td style="border: solid 1px black;"><strong>' .$totalPrice['total_price']. '</strong></td></tr>';
    $message .= '</table>';
    $success = mail($recipient, $subject, $message, $header);
    return $success;
}

function setOrdersSent($customerIdentifier)
{
    $database = dbConnect();
    $sqlQuery = 'UPDATE orders SET sent = 1 WHERE customer_identifier = :customer_identifier';
    $stmt = $database->prepare($sqlQuery);
    $stmt->bindValue(':customer_identifier', $customerIdentifier, PDO::PARAM_INT);
    $setOrderSent = $stmt->execute();
    return $setOrderSent;
}

function deleteCarts($customerIdentifier)
{
    $database = dbConnect();
    $sqlQuery = 'DELETE FROM carts
                WHERE identifier_customer = :identifier_customer';
    $stmt = $database->prepare($sqlQuery);
    $stmt->bindValue(':identifier_customer', $customerIdentifier, PDO::PARAM_INT);
    $deleted = $stmt->execute();
    return $deleted;
}

function deleteCartsCustomers($customerId)
{
    $database = dbConnect();
    $sqlQuery = 'DELETE FROM carts_customers
                WHERE id_customer = :id_customer';
    $stmt = $database->prepare($sqlQuery);
    $stmt->bindValue(':id_customer', $customerId, PDO::PARAM_INT);
    $stmt->execute();
}