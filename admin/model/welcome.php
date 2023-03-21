<?php
function welcome($f)
{
    if (isset($f)) {
        //$disconnect= "<h1 class='text-success'>Vous êtes connecté</h1>";
        $welcome= 'Bonjour ' . $f ;
        return $welcome;
    } else {
        //$disconnect= "<h1 class='text-danger'>Vous n'êtes pas connecté</h1>";
        $welcome= "Bonjour Invité(e)";
        return $welcome;
    }
}