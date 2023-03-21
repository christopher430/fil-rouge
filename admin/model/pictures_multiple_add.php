<?php
require_once('../model/connexion.php');

function insertMultiplePictures($id)
{
    $file_post = $_FILES['picture'];
    $files_ary = reArrayImages($file_post);
    for($i = 0; $i<count($files_ary); $i++) {
        $_FILES['picture']['name'] = $files_ary[$i]['name'];
        $_FILES['picture']['type'] = $files_ary[$i]['type'];
        $_FILES['picture']['tmp_name'] = $files_ary[$i]['tmp_name'];
        $_FILES['picture']['error'] = $files_ary[$i]['error'];
        $_FILES['picture']['size'] = $files_ary[$i]['size'];
        $msgPictures = uploadPictures($file_post);
        $msg = insertMultipleDatas($id);
    }
    return $msgPictures;
}

function reArrayImages($file_post)
{
    $files_ary = [];
    $file_keys = array_keys($file_post);
    foreach ($file_post as $key => $value) {
        foreach ($value as $key2 => $value2) {
            $files_ary[$key2][$key] = $value2;
        }
    }
    return $files_ary;
}

function uploadPictures($file_post)
{
    if (isset($_FILES['picture']) && $_FILES['picture']['error'] == 0) {
        if ($_FILES['picture']['size'] <= 1000000) {
            $fileInfo = pathinfo($_FILES['picture']['name']);
            $extension = $fileInfo['extension'];
            $allowedExtensions = ['jpg', 'jpeg', 'gif', 'png', 'webp'];
        } else {
            $msgPictures = "Les fichiers sont trop volumineux ! ( Max : 1 Mo / fichier )";
            return $msgPictures;
        }
            if (in_array($extension, $allowedExtensions)) {
                move_uploaded_file($_FILES['picture']['tmp_name'], '../assets/images/uploads/' . basename($_FILES['picture']['name']));
                $fileName = $_FILES['picture']['name'];
                return $fileName;
            } else {
                $msgPictures = "Merci de choisir un type de fichier valide !";
                return $msgPictures;
            }
    }
}

function checkInputs()
{
    if (!isset($_POST['name']) || (empty($_POST['name']))
        || (!isset($_FILES['picture']) || empty($_FILES['picture']))   
    ) {
		return false;
    } else {
		return true;
    }
}

function insertMultipleDatas($id)
{
        $name = strip_tags($_POST['name']);
        $path = strip_tags('assets/images/uploads/' . $_FILES['picture']['name']);
        $idSections = $id;
        $msg = addpictures($name, $path, $idSections);
        setPictureToSection($idSections);
        return $msg;
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