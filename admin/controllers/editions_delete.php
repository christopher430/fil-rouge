<?php
require_once('../model/editions_delete.php');

function editions_delete()
{
    $id = $_GET['id'];
    $msg = "";
    $msg= delete($id);    

    require('../templates/editions_delete.php');
}