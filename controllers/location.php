<?php
require_once('../model/layout.php');
require_once('../model/location.php');

function location($user)
{
    $msg = '';
    $cartsCounter = getCarts($user);
    $platforms = getPlatforms();
    $categories = getCategories();

    if(isset($_POST['submit'])) {
        $checkInputs = checkInputs();
        if($checkInputs) {
            $name = $_POST['name'];
            $forname = $_POST['forname'];
            $email = $_POST['email'];
            $message = $_POST['message'];
            $mail = sendEmail($name, $forname, $email, $message);
            if($mail) {
                $msg = '<h3 class="text-black">Message envoyé</h3>';
            } else {
                $msg = '<h3 class="text-danger">erreur lors de l\'envoi !</h3>';
            }        
        }
    }
    require('../templates/location.php');
}