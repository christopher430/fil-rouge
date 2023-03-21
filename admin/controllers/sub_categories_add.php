<?php
require_once('../model/sub_categories_add.php');

function sub_categories_add()
{
    $msg = "";
    $categories = getCategories();
    
    if(isset($_POST['submit'])) {
        $insertDatas = insertDatas();
        $msg = $insertDatas;
    }

    require('../templates/sub_categories_add.php');
}