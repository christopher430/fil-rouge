<?php
require_once('../model/login.php');

function login()
{
    $msg = "";

    if(isset($_POST['submit'])) {
        $msg = checkLogin();
    }
    require('../templates/login.php');
}