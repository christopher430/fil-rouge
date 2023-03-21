<?php
require_once('../model/texts_add.php');

function texts_add()
{
    $msg = "";
    $id = $_GET['id'];
    
    if(isset($_POST['submit'])) {
        $msg = insertDatas($id);
    }

    require('../templates/texts_add.php');
}