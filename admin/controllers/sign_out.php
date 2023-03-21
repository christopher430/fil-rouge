<?php
require_once('../model/sign_out.php');

function signOut()
{
    $disconnect = disconnect();
    require('../templates/homepage.php');
}
