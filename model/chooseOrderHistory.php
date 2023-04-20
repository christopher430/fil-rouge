<?php
require_once('connexion.php');

if(isset($_GET['identifierOrder']) && isset($_GET['identifierCustomer'])) {
    $orderHistoryIdentifier = intval($_GET['identifierOrder']);
    $customer = intval($_GET['identifierCustomer']);

    $database = dbConnect();
    $stmt = $database->prepare('SELECT * FROM orders o
                                INNER JOIN products p
                                ON p.identifier = o.products_identifier
                                INNER JOIN pictures pic
                                ON pic.id = p.id_pictures
                                WHERE customer_identifier = :customer_identifier
                                AND o.identifier = :identifier
                                AND sent = 1');
    $stmt->bindValue(':identifier', $orderHistoryIdentifier, PDO::PARAM_INT);
    $stmt->bindValue(':customer_identifier', $customer, PDO::PARAM_INT);
    $stmt->execute();

    $data = json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
    echo $data;
} else {
    echo 'missing parameter';
}