<?php
require_once('../model/admins_delete.php');

function admins_delete()
{
    $id = $_GET['id'];
    $msg = "";
    $msg= delete($id);    

    require('../templates/admins_delete.php');
}