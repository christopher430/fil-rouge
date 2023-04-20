<?php
function checkInputs()
{
    if (!isset($_POST['name']) || (empty($_POST['name']))
    || (!isset($_POST['forname']) || empty($_POST['forname']))
	|| (!isset($_POST['email']) || empty($_POST['email']))
	|| (!isset($_POST['message']) || empty($_POST['message']))
    ) {
		return false;
    } else {
		return true;
    }
}

function sendEmail($name, $forname, $email, $message)
{
    $recipient = "gamerecycle23@gmail.com";
    $subject = "Nouveau message de " . $name . " " . $forname;
    $header = $email . "\r\n";
    $header .= "MIME-Version: 1.0" . "\r\n";
    $header .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $message = $message;
    $mail = mail($recipient, $subject, $message, $header);
    return $mail;
}