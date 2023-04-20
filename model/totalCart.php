<?php
require_once('connexion.php');

if(isset($_GET['identifierCustomer'])) {
$identifierCustomer = intval($_GET['identifierCustomer']);

$database = dbConnect();
$stmt = $database->prepare('SELECT SUM(row_total) AS sum_row_total FROM carts WHERE identifier_customer = :identifier_customer');
$stmt->bindValue(':identifier_customer', $identifierCustomer, PDO::PARAM_INT);
$stmt->execute();

$data = json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
echo $data;

} else {
    echo 'missing identifierCustomer parameter';
}