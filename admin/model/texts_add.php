<?php
require_once('../model/connexion.php');

$msg='';

function insertDatas($id)
{
    $check = checkInputs();

    if($check) {
        $title = strip_tags($_POST['title']);
        $paragraphOne = strip_tags($_POST['paragraph_one']);
        if(isset($_POST['paragraph_two'])) {
            $paragraphTwo = strip_tags($_POST['paragraph_two']);
        } else {
            $paragraphTwo = '';
        }
        if(isset($_POST['paragraph_three'])) {
            $paragraphThree = strip_tags($_POST['paragraph_three']);
        } else {
            $paragraphThree = '';
        }
        if(isset($_POST['paragraph_four'])) {
            $paragraphFour = strip_tags($_POST['paragraph_four']);
        } else {
            $paragraphFour = '';
        }
        $idSections = $id;
        $msg = addTexts($title, $paragraphOne, $paragraphTwo, $paragraphThree, $paragraphFour,$idSections);
        setTextToSection($idSections);
        return $msg;
    } else {
        $msg ='<h3 class="text-danger mt-3">Il faut remplir tous les champs pour soumettre le formulaire.</h3>';
        return $msg;
    }
}

function checkInputs()
{
    if (!isset($_POST['title']) || (empty($_POST['title']))
    || (!isset($_POST['paragraph_one']) || empty($_POST['paragraph_one']))
    ) {
		return false;
    } else {
		return true;
    }
}

function addTexts($title, $paragraphOne, $paragraphTwo, $paragraphThree, $paragraphFour,$idSections)
{
    $database = dbConnect();
    $query =    'INSERT INTO texts(title, paragraph_one, paragraph_two, paragraph_three, paragraph_four, id_sections) 
                VALUES (:title, :paragraph_one, :paragraph_two, :paragraph_three, :paragraph_four, :id_sections)';
    $req = $database->prepare($query);
    $req->bindValue(':title', $title, PDO::PARAM_STR);
    $req->bindValue(':paragraph_one', $paragraphOne, PDO::PARAM_STR);
    $req->bindValue(':paragraph_two', $paragraphTwo, PDO::PARAM_STR);
    $req->bindValue(':paragraph_three', $paragraphThree, PDO::PARAM_STR);
    $req->bindValue(':paragraph_four', $paragraphFour, PDO::PARAM_STR);
    $req->bindValue(':id_sections', $idSections, PDO::PARAM_INT);
    $req->execute();
    $msg='<h3 class="text-success mt-3">Le texte a bien été ajouté.</h3>';
    return $msg;
}

function setTextToSection($idSections)
{
    $database = dbConnect();
    $query =    'UPDATE sections SET text = 1 WHERE id = :id';
    $req = $database->prepare($query);
    $req->bindValue(':id', $idSections, PDO::PARAM_INT);
    $req->execute();
}