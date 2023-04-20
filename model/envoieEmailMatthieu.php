<?php
if(isset($_POST['envoyer'])) {
    
    // Préparation du mail
    $destinataire = "contact@mowd.fr";
    $sujet = "Message de mowd.fr de la part de: ".filter_var($_POST['name'], FILTER_SANITIZE_STRING);
    $entete = "From: noreply@mowd" . "\r\n";
    $entete .= "MIME-Version: 1.0" . "\r\n";
    $entete .= "Content-type:text/html;charset=UTF-8" . "\r\n";

    $message = 'Un message à été envoyé depuis mowd.fr '.filter_var($_POST['name'], FILTER_SANITIZE_STRING).'
    <br />
    Email : '.filter_var($_POST['email'], FILTER_SANITIZE_EMAIL).'
    <br />
    <br />
    Téléphone : '.filter_var($_POST['phone'], FILTER_SANITIZE_EMAIL).'
    <br />
    <br />
    Voici son message :
    <br />
    <br />
    '
    .filter_var($_POST['message'], FILTER_SANITIZE_FULL_SPECIAL_CHARS).'
    <br />
    <br />
    ---------------
    <br />
    <br />
    Ceci est un mail automatique, Merci de ne pas y répondre.';


    mail($destinataire, $sujet, $message, $entete); // Envoi du mail
    echo '
    <script>
        /*alert("Message envoyé"); */
        window.addEventListener("load", () =>{$("#messageSent").modal("show");});
    </script>
    ';
}