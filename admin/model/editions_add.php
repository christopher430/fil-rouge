<?php
require_once('../model/connexion.php');

function insertEditionsDatas()
{
    $msg = '';
    $checkInputs = checkInputs();

    if($checkInputs) {
        $name = strip_tags($_POST['name']);
        $msg = addEditions($name);
        return $msg;
    } else {
        $msg ='<h3 class="text-danger mt-3">Il faut remplir tous les champs pour soumettre le formulaire.</h3>';
        return $msg;
    }
}

function checkInputs()
{
    if (!isset($_POST['name']) || (empty($_POST['name'])) 
    ) {
		return false;
    } else {
		return true;
    }
}

function addEditions($name)
{
    $database = dbConnect();
    $query =    'INSERT INTO editions(name) 
                VALUES (:name)';
    $stmt = $database->prepare($query);
    $stmt->bindValue(':name', $name, PDO::PARAM_STR);
    $stmt->execute();
    $msg='<h3 class="text-success mt-3">L\'édition a bien été enregistrée.</h3>';
    return $msg;
}