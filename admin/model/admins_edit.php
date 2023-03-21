<?php
require_once('../model/connexion.php');

function displayAdminsDatas($id)
{
    $database = dbConnect();
    $statement = $database->prepare(
    'SELECT * FROM admins
    WHERE id = :id' 
    );
    $statement->bindValue(':id', $id, PDO::PARAM_INT);
    $statement->execute();
    
    $admins = [];
    while (($row = $statement->fetch())) {
        $admin = [
            'name' => $row['name'],
            'forname' => $row['forname'],
            'email' => $row['email'],
            'password' => $row['password'],
        ];
        $admins[] = $admin;
    }
    return $admins;
}


function editAdminsDatas($id)
{
    $msg='';
    $checkInputs = checkInputs();

    if($checkInputs) {
        $locName = strip_tags($_POST['name']);
        global $name;
        $name = $locName;
        $locForname = strip_tags($_POST['forname']);
        global $forname;
        $forname = $locForname;
        $locEmail = strip_tags($_POST['email']);
        global $Email;
        $email = $locEmail;
        $locPassword = strip_tags($_POST['password']);
        global $password;
        $password = $locPassword;
        $locCheck = strip_tags($_POST['check']);
        global $check;
        $check = $locCheck;
        if ($password == $check) {
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            editAdmins($id, $name, $forname, $email, $password);
            $msg = "Votre modification a bien été enregistrée.";
            return $msg;
        } else {
            $msg = 'Les mots de passe ne sont pas identiques';
            return $msg;
        }
    } else {
        $msg ='<h3 class="text-danger mt-3">Il faut remplir tout les champs pour soumettre le formulaire.</h3>';
        return $msg;
    }
}

function checkInputs()
{
    if (!isset($_POST['name']) || (empty($_POST['name']))
    || (!isset($_POST['forname']) || empty($_POST['forname']))
	|| (!isset($_POST['email']) || empty($_POST['email']))
	|| (!isset($_POST['password']) || empty($_POST['password']))
    || (!isset($_POST['check']) || empty($_POST['check']))
    ) {
		return false;
    } else {
		return true;
    }
}


function editAdmins($id, $name, $forname, $email, $password)
{
    $database = dbConnect();
    $query =    'UPDATE admins SET name = :name, forname = :forname, email = :email, password = :password 
                WHERE id = :id';
    $req = $database->prepare($query);
    $req->bindValue(':id', $id, PDO::PARAM_INT);
    $req->bindValue(':name', $name, PDO::PARAM_STR);
    $req->bindValue(':forname', $forname, PDO::PARAM_STR);
    $req->bindValue(':email', $email, PDO::PARAM_STR);
    $req->bindValue(':password', $password, PDO::PARAM_STR);
    $req->execute();
}