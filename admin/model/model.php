<?php
function welcome() {
    if (isset($_SESSION['email'])) {
        $disconnect= "<h1 class='text-success'>Vous êtes connecté</h1>";
        $hello= "Bonjour " . $_SESSION['prenom'];
        $connection= '';
        return $disconnect;
    } else {
        $disconnect= "<h1 class='text-danger'>Vous n'êtes pas connecté</h1>";
        $hello= "Bonjour Invité(e)";
        $connection= '<a href="index.php?page=0">Se connecter</a>';
        return $disconnect;
    }
}