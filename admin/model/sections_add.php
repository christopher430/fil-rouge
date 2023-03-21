<?php
require_once('../model/connexion.php');

function insertSectionsDatas()
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
        $text = 0;
        $picture = 0;
        $carousel = 0;
        $layout = 9;
        $msg = addSections($name, $text, $picture, $carousel, $layout, $isEnabled);
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


function addSections($name, $text, $picture, $carousel, $layout, $isEnabled)
{
    $database = dbConnect();
    $query =    'INSERT INTO sections(name, text, picture, carousel, is_enabled, id_layouts)
                VALUES (:name, :text, :picture, :carousel, :isEnabled, :id_layouts)';
    $req = $database->prepare($query);
    $req->bindValue(':name', $name, PDO::PARAM_STR);
    $req->bindValue(':text', $text, PDO::PARAM_BOOL);
    $req->bindValue(':picture', $picture, PDO::PARAM_BOOL);
    $req->bindValue(':carousel', $carousel, PDO::PARAM_BOOL);
    $req->bindValue(':isEnabled', $isEnabled, PDO::PARAM_INT);
    $req->bindValue(':id_layouts', $layout, PDO::PARAM_INT);
    $req->execute();
    $msg='<h3 class="text-success mt-3">La section a bien été enregistrée.</h3>';
    return $msg;
}