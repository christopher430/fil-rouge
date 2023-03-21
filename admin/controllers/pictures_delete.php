<?php
require_once('../model/pictures_delete.php');

function pictures_delete()
{
    $id = $_GET['id'];
    $msg = "";
    $msg= delete($id);    

    require('../templates/pictures_delete.php');
}