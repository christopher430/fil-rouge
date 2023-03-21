<?php
require_once('../model/connexion.php');

function insertPlatformsDatas()
{
    $msg = '';
    $msgPicture = '';
    $checkInputs = checkInputs();

    if($checkInputs) {
        $name = strip_tags($_POST['name']);
        $pictureName = strip_tags($_POST['pictureName']);
        $path = strip_tags('assets/images/uploads/' . $_FILES['picture']['name']);
        picturesAdd($pictureName, $path);
        $picturesId = getPicturesId($pictureName);
        $msg = addPlatforms($name, $picturesId);
        return $msg;
    } else {
        $msg ='<h3 class="text-danger mt-3">Il faut remplir tous les champs pour soumettre le formulaire.</h3>';
        return $msg;
    }
}

function checkInputs()
{
    if (!isset($_POST['name']) || (empty($_POST['name']))
    || (!isset($_FILES['picture']) || (empty($_FILES['picture'])))
    || (!isset($_POST['pictureName']) || (empty($_POST['pictureName'])))
    ) {
		return false;
    } else {
		return true;
    }
}

function picturesAdd($name, $path)
{
    $database = dbConnect();
		$query =    'INSERT INTO pictures(name, path) 
                    VALUES (:name, :path)';
        $stmt = $database->prepare($query);
        $stmt->bindValue(':name', $name, PDO::PARAM_STR);
        $stmt->bindValue(':path', $path, PDO::PARAM_STR);
        $stmt->execute();
}

function getPicturesId($pictureName)
{
    $database = dbConnect();
    $statement = $database->prepare(
    'SELECT id FROM pictures
    WHERE name = :name'
    );
    $statement->bindValue(':name', $pictureName, PDO::PARAM_STR);
    $statement->execute();
    $picturesIds = [];
    while (($row = $statement->fetch())) {
        $picturesId = [
            'id' => $row['id'],
        ];
        $picturesIds[] = $picturesId;
    }
    $idPictures = $picturesIds[0]['id'];
    return $idPictures;
}

function addPlatforms($name, $picturesId)
{
    $database = dbConnect();
    $query =    'INSERT INTO platforms(name, id_pictures) 
                VALUES (:name, :id_pictures)';
    $stmt = $database->prepare($query);
    $stmt->bindValue(':name', $name, PDO::PARAM_STR);
    $stmt->bindValue(':id_pictures', $picturesId, PDO::PARAM_INT);
    $stmt->execute();
    $msg='<h3 class="text-success mt-3">La plateforme a bien été enregistrée</h3>';
    return $msg;
}