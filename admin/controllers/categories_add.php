<?php
require_once('../model/categories_add.php');

function categories_add()
{
    $msg = "";
    
    if(isset($_POST['submit'])) {
        $insertDatas = insertDatas();
        $msg = $insertDatas;
    }

    require('../templates/categories_add.php');
}