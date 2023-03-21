<?php
require_once('../model/pictures_add.php');
require_once('../model/editions_add.php');

function editions_add()
{
    $msg = "";
    
    if(isset($_POST['submit'])) {
        $msg = insertEditionsDatas();
    }

    require('../templates/editions_add.php');
}