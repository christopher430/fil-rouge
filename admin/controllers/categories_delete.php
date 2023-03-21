<?php
require_once('../model/categories_delete.php');

function categories_delete()
{
    $id = $_GET['id'];
    $msg = "";
    $msg= delete($id);    

    require('../templates/categories_delete.php');
}