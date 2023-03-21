<?php
require_once('../model/sub_categories_delete.php');

function sub_categories_delete()
{
    $id = $_GET['id'];
    $msg = "";
    $msg= delete($id);    

    require('../templates/sub_categories_delete.php');
}