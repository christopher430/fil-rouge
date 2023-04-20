<?php
require_once('../model/connexion.php');
require_once('../controllers/homepage.php');

function checkLogin()
{
    $checkInputsLogin = checkInputsLogin();

    if($checkInputsLogin) {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $forname= '';
        $getPassword = getPassword($email);
        if(password_verify($password, $getPassword['password'])) {
            $_SESSION['email_back'] = $_POST['email'];
            $_SESSION['password_back'] = $_POST['password'];
            $_SESSION['forname_back'] = $getPassword['forname'];
            $msg = $_SESSION['forname_back'];
            homepage($_SESSION['forname_back']);
            return $msg;
        } else {
            $msg= '<h3 class="text-danger mt-3">Vérifiez l\'email et le mot de passe</h3>';
            return $msg;
        }
    } else {
        $msg ='<h3 class="text-danger mt-3">Il faut remplir tous les champs pour soumettre le formulaire</h3>';
        return $msg;
    }
}

function checkInputsLogin()
{
    if (!isset($_POST['email']) || (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
    || (!isset($_POST['password']) || empty($_POST['password']))) {
        $checkInputsLogin = false;
		return $checkInputsLogin;
    } else {
        $checkInputsLogin = true;
		return $checkInputsLogin;
    }
}

function getPassword($e)
{
    $database = dbConnect();
    $sqlQuery = 'SELECT password,forname FROM admins WHERE email = :email';
    $adminStatement = $database->prepare($sqlQuery);
    $adminStatement->bindValue(':email', $e, PDO::PARAM_STR);
    $adminStatement->execute();
    $getPassword = $adminStatement->fetch();
    return $getPassword;
}