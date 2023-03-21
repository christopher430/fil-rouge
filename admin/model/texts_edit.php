<?php
require_once('../model/connexion.php');

function displayTextsDatas($id)
{
    $database = dbConnect();
    $statement = $database->prepare(
    'SELECT * FROM texts
    WHERE id = :id' 
    );
    $statement->bindValue(':id', $id, PDO::PARAM_INT);
    $statement->execute();
    
    $texts = [];
    while (($row = $statement->fetch())) {
        $text = [
            'title' => $row['title'],
            'paragraph_one' => $row['paragraph_one'],
            'paragraph_two' => $row['paragraph_two'],
            'paragraph_three' => $row['paragraph_three'],
            'paragraph_four' => $row['paragraph_four'],
        ];
        $texts[] = $text;
    }
    return $texts;
}


function editTextsDatas($id)
{
    $msg='';
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
        $idTexts = $id;
        editTexts($id, $title, $paragraphOne, $paragraphTwo, $paragraphThree, $paragraphFour);
        $msg = "<h3 class='text-success'>Votre modification a bien été enregistrée</h3>";
        return $msg;
    } else {
        $msg ='<h3 class="text-danger mt-3">Il faut remplir tous les champs pour soumettre le formulaire.</h3>';
        return $msg;
    }
}

function checkInputs()
{
    if (!isset($_POST['title']) || (empty($_POST['title']))) {
		return false;
    } else {
		return true;
    }
}


function editTexts($id, $title, $paragraphOne, $paragraphTwo, $paragraphThree, $paragraphFour)
{
    $database = dbConnect();
    $query =    'UPDATE texts SET title = :title, paragraph_one = :paragraph_one, paragraph_two = :paragraph_two, paragraph_three = :paragraph_three, paragraph_four = :paragraph_four
                WHERE id = :id';
    $req = $database->prepare($query);
    $req->bindValue(':id', $id, PDO::PARAM_INT);
    $req->bindValue(':title', $title, PDO::PARAM_STR);
    $req->bindValue(':paragraph_one', $paragraphOne, PDO::PARAM_STR);
    $req->bindValue(':paragraph_two', $paragraphTwo, PDO::PARAM_STR);
    $req->bindValue(':paragraph_three', $paragraphThree, PDO::PARAM_STR);
    $req->bindValue(':paragraph_four', $paragraphFour, PDO::PARAM_STR);
    $req->execute();
}