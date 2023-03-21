<?php
require_once('../model/admins_add.php');

function admins_add()
{
    $msg = "";
    
    if(isset($_POST['submit'])) {
        $msg = insertDatas();
    }

    require('../templates/admins_add.php');
}