<?php
require_once('../model/admins_edit.php');

function admins_edit()
{
    $msg = "";
    if(isset($_GET['id'])) {
        $adminsId = $_GET['id'];
        $admins = displayAdminsDatas($adminsId);
    }
    
    if(isset($_POST['submit'])) {
        $msg = editAdminsDatas($adminsId);
        $admins = displayAdminsDatas($adminsId);
    }

    require('../templates/admins_edit.php');
}