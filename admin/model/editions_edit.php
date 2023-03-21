<?php
require_once('../model/connexion.php');

function displayEditionsDatas($id)
{
    $database = dbConnect();
    $statement = $database->prepare(
    'SELECT * FROM editions
    WHERE id = :id' 
    );
    $statement->bindValue(':id', $id, PDO::PARAM_INT);
    $statement->execute();
    
    $editions = [];
    while (($row = $statement->fetch())) {
        $edition = [
            'name' => $row['name'],
        ];
        $editions[] = $edition;
    }
    return $editions;
}


function editEditionsDatas($id)
{
    $msg='';
    $checkInputs = checkInputs();

    if($checkInputs) {
        $name = strip_tags($_POST['name']);
        $msg = editEditions($id, $name);
        return $msg;
    } else {
        $msg ='<h3 class="text-danger mt-3">Il faut remplir tout les champs pour soumettre le formulaire.</h3>';
        return $msg;
    }
}

function checkInputs()
{
    if (!isset($_POST['name']) || (empty($_POST['name']))) {
		return false;
    } else {
		return true;
    }
}


function editEditions($id, $name)
{
    $database = dbConnect();
		$query =    'UPDATE editions SET name = :name 
                    WHERE id = :id';
        $req = $database->prepare($query);
        $req->bindValue(':id', $id, PDO::PARAM_INT);
        $req->bindValue(':name', $name, PDO::PARAM_STR);
        $req->execute();
        $msg = '<h3 class="text-success">Votre modification a bien été enregistrée</h3>';
        return $msg;
}