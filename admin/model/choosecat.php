<?php

require_once('connexion.php');

if(isset($_GET['idCat'])) {
    $idCategorie = intval($_GET['idCat']);

    $database = dbConnect();
    $stmt = $database->prepare("SELECT id, name FROM sub_categories WHERE id_categories=:id_categories");
    $stmt->bindParam(':id_categories', $idCategorie, PDO::PARAM_INT);
    $stmt->execute();


    $data = json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
    echo $data;
} else {
    echo 'missing parameter';
}