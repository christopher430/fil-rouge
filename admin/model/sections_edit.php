<?php
require_once('../model/connexion.php');

function displaySectionsDatas($id)
{
    $database = dbConnect();
    $statement = $database->prepare(
    'SELECT * FROM sections
    WHERE id = :id' 
    );
    $statement->bindValue(':id', $id, PDO::PARAM_INT);
    $statement->execute();
    
    $sections = [];
    while (($row = $statement->fetch())) {
        $section = [
            'name' => $row['name'],
            'is_enabled' => $row['is_enabled'],
        ];
        $sections[] = $section;
    }
    return $sections;
}


function editSectionsDatas($id)
{
    $msg='';
    $checkInputs = checkInputs();

    if($checkInputs) {
        $name = strip_tags($_POST['name']);
        if (isset($_POST['isEnabled'])) {
            $isEnabled = 1;
        } else {
            $isEnabled = 0;
        }
        editSections($id, $name, $isEnabled);
        $msg = "<h3 class='text-success'>Votre modification a bien été enregistrée</h3>";
        return $msg;
    } else {
        $msg ='<h3 class="text-danger mt-3">Il faut remplir tous les champs pour soumettre le formulaire.</h3>';
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


function editSections($id, $name, $isEnabled)
{
    echo $isEnabled;
    $database = dbConnect();
    $query =    'UPDATE sections SET name = :name, is_enabled = :is_enabled
                WHERE id = :id';
    $req = $database->prepare($query);
    $req->bindValue(':id', $id, PDO::PARAM_INT);
    $req->bindValue(':name', $name, PDO::PARAM_STR);
    $req->bindValue(':is_enabled', $isEnabled, PDO::PARAM_INT);
    $req->execute();
}