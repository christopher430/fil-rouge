<?php
require_once('../model/layout.php');
require_once('../model/signOut.php');

function signOut($user)
{
    $cartsCounter = getCarts($user);
    $platforms = getPlatforms();
    $categories = getCategories();

    $disconnect = disconnect();
    require('../templates/homepage.php');
}
