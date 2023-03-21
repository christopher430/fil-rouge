<?php
require_once('../model/connexion.php');

function insertPictures()
{
    if (isset($_FILES['picture']) && $_FILES['picture']['error'] == 0) {
        if ($_FILES['picture']['size'] <= 1000000) {
            $fileInfo = pathinfo($_FILES['picture']['name']);
            $extension = $fileInfo['extension'];
            $allowedExtensions = ['jpg', 'jpeg', 'gif', 'png'];
        } else {
            $msgPictures = "Le fichier est trop volumineux ! ( Max : 1 Mo )";
            return $msgPictures;
        }
            if (in_array($extension, $allowedExtensions)) {
                move_uploaded_file($_FILES['picture']['tmp_name'], '../assets/images/uploads/' . basename($_FILES['picture']['name']));

            } else {
                $msgPictures = "Merci de choisir un type de fichier valide !";
                return $msgPictures;
            }
    }
}

function insertDatas($id)
{
    $checkInputs = checkInputs();

    if($checkInputs) {
        $name = strip_tags($_POST['name']);
        $path = strip_tags('assets/images/uploads/' . $_FILES['picture']['name']);
        $idSections = $id;
        $msg = addpictures($name, $path, $idSections);
        setPictureToSection($idSections);
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


function addpictures($name, $path, $idSections)
{
    $database = dbConnect();
    $query =    'INSERT INTO pictures(name, path, id_sections) 
                VALUES (:name, :path, :id_sections)';
    $req = $database->prepare($query);
    $req->bindValue(':name', $name, PDO::PARAM_STR);
    $req->bindValue(':path', $path, PDO::PARAM_STR);
    $req->bindValue(':id_sections', $idSections, PDO::PARAM_INT);
    $req->execute();
    $msg='<h3 class="text-success mt-3">La photo a bien été enregistrée.</h3>';
    return $msg;
}

function setPictureToSection($idSections)
{
    $database = dbConnect();
    $query =    'UPDATE sections SET picture = 1 WHERE id = :id';
    $req = $database->prepare($query);
    $req->bindValue(':id', $idSections, PDO::PARAM_INT);
    $req->execute();
}