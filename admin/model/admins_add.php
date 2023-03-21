<?php
require_once('../model/connexion.php');

function insertDatas()
{
    $msg='';
    $checkInputs = checkInputs();

    if($checkInputs) {
        $locName = strip_tags($_POST['name']); // à retirer pour test
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
            addAdmins($name, $forname, $email, $password);
            $msg = "Votre ajout a bien été enregistré.";
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


function addAdmins($name, $forname, $email, $password)
{
    $database = dbConnect();
		$query =    'INSERT INTO admins(name, forname, email, password) 
                    VALUES (:name, :forname, :email, :password)';
        $req = $database->prepare($query);
        $req->bindValue(':name', $name, PDO::PARAM_STR);
        $req->bindValue(':forname', $forname, PDO::PARAM_STR);
        $req->bindValue(':email', $email, PDO::PARAM_STR);
        $req->bindValue(':password', $password, PDO::PARAM_STR);
        $req->execute();
        $msg='<h3 class="text-success mt-3">L\'admin a bien été enregistré.</h3>';
        return $msg;
}