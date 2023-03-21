<?php
require_once('../model/connexion.php');

$msg='';

function insertDatas()
{
    $check = checkInputs();

    if($check) {
        $name = strip_tags($_POST['name']);
        $description = strip_tags($_POST['description']);
        if (isset($_POST['isEnabled'])) {
            $isEnabled = 1;
        } else {
            $isEnabled = 0;
        }
        $msg = addCategories($name, $description, $isEnabled);
        return $msg;
    } else {
        $msg ='<h3 class="text-danger mt-3">Il faut remplir tous les champs pour soumettre le formulaire.</h3>';
        return $msg;
    }
}

function checkInputs()
{
    if (!isset($_POST['name']) || (empty($_POST['name']))
    || (!isset($_POST['description']) || empty($_POST['description']))
    ) {
		return false;
    } else {
		return true;
    }
}

function addCategories($name, $description, $isEnabled)
{
    $database = dbConnect();
    $query =    'INSERT INTO categories(name, description, is_enabled) 
                VALUES (:name, :description, :isEnabled)';
    $req = $database->prepare($query);
    $req->bindValue(':name', $name, PDO::PARAM_STR);
    $req->bindValue(':description', $description, PDO::PARAM_STR);
    $req->bindValue(':isEnabled', $isEnabled, PDO::PARAM_BOOL);
    $req->execute();
    $msg='<h3 class="text-success mt-3">La catégorie a bien été ajoutée.</h3>';
    return $msg;
}