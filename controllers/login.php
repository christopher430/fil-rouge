<?php
require_once('../model/layout.php');
require_once('../model/login.php');
require_once('../controllers/homepage.php');

function login($user)
{
    $cartsCounter = getCarts($user);

    if(isset($_GET['userIdentifier'])) {
        $userIdentifier = $_GET['userIdentifier'];
        $cartsCounter = getCarts($user);
        $idCart = getIdCarts($user);
    } else {
        if(isset($_SESSION['customer'])) {
            $idCart = getIdCarts($_SESSION['customer']);
        } else {
            $idCart = getIdCarts($_SESSION['user']);
        }
    }

    $msgLogin = "";
    $msgAccount = '<h5 class="text-dark text-opacity-50 ms-3">Connectez-vous ou créez un compte</h5>';
    $platforms = getPlatforms();
    $categories = getCategories();



    if(isset($_POST['connect'])) {
        $checkInputsLogin = checkInputsLogin();

        if($checkInputsLogin) {
            $msgLogin = createSession($idCart);
            if($msgLogin == 'success') {
                header('Location: index.php');
            }
        } else {
            $msgLogin ='<h3 class="text-danger mt-3">Il faut remplir tous les champs pour vous connecter</h3>';
        }    
    }

    if(isset($_POST['submit'])) {
        $checkInputsAccount = checkInputsAccount();

        if($checkInputsAccount) {
            $msgAccount = createAccount($user);
        } else {
            $msgAccount ='<h3 class="text-danger mt-3">Il faut remplir tous les champs pour créer un compte</h3>';
        }
    }

    require('../templates/login.php');
}