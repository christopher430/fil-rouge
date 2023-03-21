<?php
require_once('../model/connexion.php');

$msg='';


function getLayouts()
{
    $database = dbConnect();
    $statement = $database->query(
    'SELECT * FROM layouts'
    );
    $layouts = [];
    while (($row = $statement->fetch())) {
        $layout = [
            'id' => $row['id'],
            'description' => $row['description'],
            ];
        $layouts[] = $layout;
    }
    return $layouts;
}


function boundLayout($idSections)
{
    $check = checkInputs();

    if($check) {
        $idChoice = strip_tags($_POST['choice']);
        $msg = addLayoutsId($idSections, $idChoice);
        return $msg;
    }
}

function checkInputs()
{
    if (!isset($_POST['choice'])) {
		return false;
    } else {
		return true;
    }
}

function addLayoutsId($idSections, $idChoice)
{
    if($idChoice == 7) {
        $carousel = 1;
    } else {
        $carousel = 0;
    }
    $database = dbConnect();
    $query =    'UPDATE sections SET carousel = :carousel, id_layouts = :id_layouts
                WHERE id = :id';
    $req = $database->prepare($query);
    $req->bindValue(':id', $idSections, PDO::PARAM_INT);
    $req->bindValue(':carousel', $carousel, PDO::PARAM_BOOL);
    $req->bindValue(':id_layouts', $idChoice, PDO::PARAM_INT);
    $req->execute();
    $msg='<h3 class="text-success mt-3">La mise en forme a bien été ajoutée.</h3>';
    return $msg;
}