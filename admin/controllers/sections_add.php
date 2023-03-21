<?php
require_once('../model/sections_add.php');

function sections_add()
{
    $msg = "";
    
    if(isset($_POST['submit'])) {
        $msg = insertSectionsDatas();
    }

    require('../templates/sections_add.php');
}